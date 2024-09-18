<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountManagement extends Model
{
    use HasFactory;
    protected $table="acct_pricings";
    protected $fillable = ['name','price','duration','description'];
    protected $casts = [
        'benefits' => 'array',
        // 'duration' => 'array',
    ];
}
