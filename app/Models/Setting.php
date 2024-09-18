<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
           'id', 'facebook', 'twitter', 'instagram', 'youtube', 'email', 'phone', 'created_at', 'updated_at', 'paypal', 'btc', 'usdt', 'skrill', 'net', 'wu', 'pm', 'mg','telegram','free_signal'
        ];
}
