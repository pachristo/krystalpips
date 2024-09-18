<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trades extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'amount', 'type','status','video_url','image','date'];
}
