<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Model;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $post = Post::pluck('id')->toArray();
        $user = User::pluck('id')->toArray();
        return [
            'comment' => $this->faker->name(),
            'post_id' => $this->faker->randomElement($post),
            'user_id' => $this->faker->randomElement($user)
        ];
    }
}
