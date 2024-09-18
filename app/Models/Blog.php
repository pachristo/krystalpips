<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'slug', 'description', 'meta_description', 'meta_keywords', 'content', 'photo',
    ];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($blog) {
            // Enforce unique slug constraint
            $slug = $blog->slug ?? \Str::slug($blog->title);
            $count = static::where('slug', $slug)->where('id', '!=', $blog->id)->count();

            if ($count > 0) {
                $slug .= '-' . ($count + 1);
            }

            $blog->slug = $slug;
        });
    }

}
