<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    public static function checkIsTicketType($priceId)
    {
        $price = Price::find($priceId);
        return $price->price_type_id == 1 ? true : false;
    }
}
