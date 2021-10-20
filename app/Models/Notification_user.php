<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification_user extends Model
{
    use HasFactory;

    public $guarded = ['id'];

    public function notification()
    {
        return $this->belongsTo(Notification::class);
    }
}
