<?php

namespace App\Models;

use CloudinaryLabs\CloudinaryLaravel\MediaAlly;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory , MediaAlly;

    protected $fillable = ['url', 'post_id'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
