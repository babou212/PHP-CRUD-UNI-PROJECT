<?php

namespace Database\Factories\comment;

use App\Models\comment\Comment;
use App\Models\post\Post;
use App\Models\user\User;
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
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userId = User::inRandomOrder()->value('id');
        $postId = Post::inRandomOrder()->value('id');

        return [
            'user_id' => $userId,
            'post_id' => $postId,
            'body' => $this->faker->text(50),
        ];
    }
}
