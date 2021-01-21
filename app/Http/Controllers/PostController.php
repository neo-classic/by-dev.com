<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('post.index', [
            'posts' => Post::where('is_active', 1)
                ->with('tags')
                ->orderByDesc('id')
                ->simplePaginate(10),
        ]);
    }

    public function view(string $slug)
    {
        $post = Post::where('slug', $slug)->first();
        if (!$post) {
            abort(404);
        }

        return view('post.view', [
            'post' => $post,
        ]);
    }
}
