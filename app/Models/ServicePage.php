<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePage extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'name',
        'title',
        'meta_description',
        'meta_keywords',
        'head1',
        'head2',
        'cta_label',
        'packages_heading',
        'intro',
        'footer_content',
        'author',
        'author_role',
        'author_photo',
        'author_bio',
    ];

    public static function keys(): array
    {
        return [
            'signals',
            'mentorship',
            'investment',
            'account-management',
            'courses',
        ];
    }
}
