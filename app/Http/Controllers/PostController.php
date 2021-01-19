<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('post.index', [
            'posts' => Post::where('is_active', 1)
                ->orderByDesc('id')
                ->simplePaginate(1),
        ]);
    }

    public function view(string $slug)
    {
        return "Read the post slug: $slug";
    }
}
