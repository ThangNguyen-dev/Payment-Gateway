<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Notification_user;
use App\Models\Transaction;
use App\Models\Transaction_partner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $senders = Auth::user()->sender;
        $receivers = Auth::user()->receiver;
        $transactions = array();
        foreach ($receivers as $receiver) {
            $receiver['price'] = "+" . $receiver['price'];
            array_push($transactions, $receiver);
        }
        foreach ($senders as $sender) {
            $sender['price'] = "-" . $sender['price'];
            array_push($transactions, $sender);
        }

        $transactions = collect($transactions)->sortByDesc('created_at');
        return view('transaction.index', ['transactions' => $transactions]);
    }

    public function transferMoneyFromBank(Request $request)
    {
        $bankAcc = $request->validate(
            [
                'username_bank' => 'required',
                'date_active' => 'required',
                'money' => 'required',
                'credit_card' => 'required',
                'bank' => 'required',
            ]
        );

        $respone = Http::post('http://localhost/paymentgateway/api/v1/bank', $bankAcc);
        $body = json_decode($respone->body(), true);

        if (!$body['status']) {
            return back()->withInput()->withErrors(['account' => 'An error occurred please try again later']);
        }
        $user = User::find(Auth::id());
        $user['balance'] = $user['balance'] + $body['price'];

        $user->update();

        return redirect()->route('user.index')->with(['success' => 'Transaction successfully']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function transfer()
    {
        return view('transaction.transfer');
    }

    public function transfermoney(Request $request)
    {
        $transaction = $request->validate(
            [
                'number_phone' => ['required', 'min:8', 'max:13'],
                'price' => ['required', 'max:23'],
                'description' => ['required'],
            ]
        );
        $user_sender = User::where('id', Auth::id())->first();
        if ($user_sender['balance'] < $transaction['price']) {
            return back()->withInput()->withErrors(['transfer' => "You don't have enough money to make the transaction"]);
        }
        $user_sender['balance'] = (int)$user_sender['balance'] - (int)$transaction['price'];
        $transaction['title'] = 'Chuyen Tien';
        $transaction['number'] = '1';

        $transaction['code_bill'] = \Illuminate\Support\Str::random(6);
        $user_receiver = User::where('number_phone', $transaction['number_phone'])->first();
        if (is_null($user_receiver)) {
            return back()->withInput();
        }
        $transaction['user_id_sender'] = Auth::id();
        $transaction['user_id_receiver'] = $user_receiver->id;
        $user_receiver->balance = (int)$user_receiver->balance + (int)$transaction['price'];

        $transaction = Transaction::create($transaction);
        $user_sender->update();
        $user_receiver->update();
        $notification = [
            'transaction_id' => $transaction->id,
            'title' => 'Chuyen Tien',
            'description' => $transaction->description,
            'read' => 0,
        ];
        $notification = Notification::create($notification);

        $notification_users =
            [
                'user_id' => $user_receiver->id,
                'notification_id' => $notification->id,
            ];
        $notification_users = Notification_user::create($notification_users);

        $notification_users =
            [
                'user_id' => Auth::id(),
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
        return redirect()->route('home')->withInput(['success' => 'Transfer successfully']);
    }

    /**
     * @param Request $request
     * @return strin fullname
     */
    public function getuser(Request $request)
    {
        $user = User::where('number_phone', $request['number_phone'])->first();
        if (!is_null($user)) {
            return \response()->json(
                [
                    'fullname' => $user['fullname']
                ]
                , 200);
        }
        return \response()->json(
            [
                'message' => "Number Phone not found",
            ], 404
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Transaction $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        return view('transaction.detail', ['transaction' => $transaction]);
    }

    public function bank()
    {
        return view('transaction.bank');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Transaction $transaction
     * @return \Illuminate\Http\Response
     */

    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Transaction $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Transaction $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
