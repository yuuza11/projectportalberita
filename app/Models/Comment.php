<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments'; // pakai nama tabel manual
    protected $fillable = ['user_id', 'berita_id', 'content'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function news() {
        return $this->belongsTo(News::class, 'berita_id');
    }
}
