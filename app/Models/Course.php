<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses_pricings';

    protected $fillable = [
        'name',
        'summary',
        'author',
        'author_role',
        'author_photo',
        'author_bio',
        'image',
        'price',
        'duration',
        'benefits',
        'footer',
    ];

    protected $casts = [
        'benefits' => 'array',
    ];
}
