<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    public $timestamps = true; // (opsional, true secara default)

    protected $fillable = ['title','slug', 'description', 'image', 'category'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($news) {
            $news->slug = Str::slug($news->title);
        });
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'berita_id');
    }

}
