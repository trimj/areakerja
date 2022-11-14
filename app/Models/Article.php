<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Added
use Mews\Purifier\Casts\CleanHtmlInput;

class Article extends Model
{
    // use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'content',
        'image',
    ];

    protected $casts = [
        'content' => CleanHtmlInput::class,
    ];

    public function author()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
