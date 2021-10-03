<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Notification_user;
use App\Models\Transaction;
use App\Models\Transaction_partner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        return view('transaction.index');
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
        $user_sender = Auth::user();
        $user_sender['balance'] = $user_sender['balance'] - $transaction['price'];
        $transaction['title'] = 'Chuyen Tien';
        $transaction['number'] = '1';

        $transaction['code_bill'] = \Illuminate\Support\Str::random(6);
        $user_receiver = User::where('number_phone', $transaction['number_phone'])->first();
        if (is_null($user_receiver)) {
            return back()->withInput();
        }
        $transaction['user_id_sender'] = Auth::id();
        $transaction['user_id_receiver'] = $user_receiver->id;
        $user_receiver->balance = $user_receiver->balance + $transaction['price'];


        $transaction = Transaction::create($transaction);
        $user_sender = $user_sender->update();
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
            'transaction_fullname' => $user_receiver->fullname,
            'tax_code' => Str::random(6),
            'representation' => $user_receiver->fullname,
            'identity_card' => rand(1000000, 99999999),
        ];

        $transaction_partner = Transaction_partner::create($transaction_partner);
        return redirect()->route('home')->withInput(['success' => 'Transfer successfully']);
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
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
