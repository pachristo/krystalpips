<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenPricing extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'duration', 'price', 'benefits'];
    protected $casts = [
        'benefits' => 'array',
        // 'duration' => 'array',
    ];
}
