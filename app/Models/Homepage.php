<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homepage extends Model
{
    use HasFactory;
    protected $fillable=[
        'title','meta_description','meta_keywords','head1','head2','head3','signals','investment','community_support','mentorship','proven_strategy','commitment','trading_tools','about','plan_signal', 'plan_mentor', 'plan_investment', 'plan_courses' ,'footer','about_photo' ,'about_video'// Add your fields here.
    ];
}
