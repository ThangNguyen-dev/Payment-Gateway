<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientRS;
use App\Models\Notification;
use App\Models\Notification_user;
use App\Models\Transaction;
use App\Models\Transaction_partner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $redirect = $request['redirectUrl'];
        $secretKey = $request['secretKey'];
        $user = User::where('id', $request['userID'])->first();
        $price = $request['price'];
        session([
            'redirect' => $redirect,
            'secretKey' => $secretKey,
            'user' => $user,
            'price' => $price,
        ]);
        Auth::logout();
        return view('payment.signin', ['redirect' => $redirect, 'secretKey' => $secretKey, 'user' => $user, 'price' => $price]);
    }

    /**
     * Show the form for creating a new resource.
     * @param Request $request ;
     * @return Response
     */
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            $user_receiver = (session()->get('user'));
            $price = session()->get('price');
            $user_sender = User::where('id',Auth::id())->first();
            $user_sender['balance'] = (int)$user_sender['balance'] - (int)$price;
            $user_receiver['balance'] = (int)$user_receiver['balance'] + (int)$price;
            $transaction = [
                'user_id_sender' => $user_sender->id,
                'user_id_receiver' => $user_receiver->id,
                'title' => "Thanh toan Online",
                'code_bill' => \Illuminate\Support\Str::random(6),
                'description' => 'Thanh toan don hanh tai ' . session()->get('redirect'),
                'price' => $price,
                'number' => 1
            ];
            if ($user_sender->id == $user_receiver->id) {
                return back()->withInput()->withErrors(['login' => 'User receiver is you']);
            }
            $transaction = Transaction::create($transaction);
            $user_sender->update();
            $user_receiver->update();
            $notification = [
                'transaction_id' => $transaction->id,
                'title' => 'Thanh toan Online',
                'description' => 'Thanh toan don hanh tai ' . session()->get('redirect'),
                'read' => 0
            ];
            $notification = Notification::create($notification);

//            create notification user for user receiver
            $notification_users =
                [
                    'user_id' => $user_receiver->id,
                    'notification_id' => $notification->id,
                ];
            $notification_users = Notification_user::create($notification_users);

//            create notification user for user sender
            $notification_users =
                [
                    'user_id' => $user_receiver->id,
                    'notification_id' => $notification->id,
                ];
            $notification_users = Notification_user::create($notification_users);

            $transaction_partner = [
                'transaction_id' => $transaction->id,
                'transaction_fullname' => $user_sender->fullname,
                'tax_code' => Str::random(6),
                'representation' => $user_receiver->fullname,
                'identity_card' => rand(1000000, 99999999),
            ];
            $transaction_partner = Transaction_partner::create($transaction_partner);
        } else {
            return back()->withInput()->withErrors(['login' => 'Email or password incorrect']);
        };
        $url = (session()->get('redirect'));
        $url = str_replace("'", "", $url);
        return redirect()->away($url . 'success?status=200&code_bill=' . $transaction->code_bill);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function getBill(Request $request)
    {
        $inputJson = json_decode(json_encode($request->json()->all()));
        $user = User::where('email', $inputJson->email)->first();
        if (empty($user)) {
            return response()->json(
                [
                    "success" => false,
                    "message" => "User not found",
                ]
                , 404);
        };
        $transaction = Transaction::where('user_id_receiver', $user->id)->where('code_bill', $inputJson->code_bill)->first();
        return response()->json(
            [
                "transaction" => new ClientRS($transaction)
            ]
            , 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
