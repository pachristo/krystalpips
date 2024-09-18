<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'text', 'photo', 'rating','video_url'];
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
