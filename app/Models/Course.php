<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable=[
        'id', 'name', 'summary', 'author', 'image', 'price', 'created_at', 'updated_at'
    ];
    protected $table="courses_pricings";
}
