<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();
        foreach ($posts as $post) {
            $tagCount = rand(1, 8);
            $tags = Tag::inRandomOrder()->limit($tagCount)->get();
            foreach ($tags as $tag) {
                $postTag = new PostTag();
                $postTag->post_id = $post->id;
                $postTag->tag_id = $tag->id;
                $postTag->save();
            }
        }
    }
}
