<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
     'id', 'user_id', 'trans_id', 'sub_id', 'next_due_date', 'sub_date', 'created_at', 'updated_at', 'plan_type', 'roi', 'amount', 'duration'
    ];
}
