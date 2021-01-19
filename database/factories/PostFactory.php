<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->unique()->realText(50);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'announce' => $this->faker->text(1000),
            'body' => $this->faker->text,
            'is_active' => $this->faker->boolean,
        ];
    }
}
