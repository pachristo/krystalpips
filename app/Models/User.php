<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
   'id', 'name', 'email', 'email_verified_at', 'password', 'remember_token', 'created_at', 'updated_at', 'is_verified', 'sub_id', 'sub_status', 'sub_count', 'acct_name', 'acct_no', 'telegram_id', 'phone', 'status', 'acct_bank', 'trans_id', 'men_sub_id', 'men_sub_status', 'men_sub_next_due_date', 'sub_next_due_date', 'inv_sub_id', 'inv_sub_status', 'inv_sub_next_due_date', 'telegram', 'avatar', 'acct_sub_id', 'acct_sub_status', 'acct_sub_next_due_date'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'men_sub_status'=>'boolean', 
            'sub_status'=>'boolean', 
            'acct_sub_status'=>'boolean',
            'inv_sub_status'=>'boolean', 
            'is_verified' => 'boolean',
        ];
    }
}
