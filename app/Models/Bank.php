<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;


    /**
     * @return array 
     */
    public static function listBanks()
    {
        return  [
            [
                "card_number" => "9704151525460896",
                "date_ative" => "11/18",
                "username_bank" => "NGUYEN VAN A",
                "bank" => "Vietinbank"
            ],
            [
                "card_number" => "9704151525460896",
                "date_ative" => "11/18",
                "username_bank" => "NGUYEN VAN B",
                "bank" => "Vietinbank"
            ],
            [
                "card_number" => "9704151525460860",
                "date_ative" => "12/18",
                "username_bank" => "NGUYEN VAN C",
                "bank" => "Vietinbank"
            ],
        ];
    }
    
    public static function getOTP()
    {
        return "11111"; 
    }
}
