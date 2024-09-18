<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bot extends Model
{
    protected $table="bot_pricings";
    use HasFactory;
    protected $fillable = [ 'id', 'name', 'summary', 'author', 'image', 'price', 'created_at', 'updated_at','date'];
}
