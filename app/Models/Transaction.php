<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public $guarded = ['id'];

    public function transaction_partner()
    {
        return $this->hasOne(Transaction_partner::class, 'transaction_id');
    }

    public function receiver()
    {
        return $this->hasOne(User::class, 'id', 'user_id_receiver');
    }

    public function send()
    {
        return $this->hasOne(User::class, 'id', 'user_id_sender');
    }
}
