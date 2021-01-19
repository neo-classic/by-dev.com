<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    use HasFactory;

    protected $table = 'post_tag';

    public function post()
    {
        return $this->hasOne(Post::class);
    }

    public function tag()
    {
        return $this->hasOne(Tag::class);
    }
}
