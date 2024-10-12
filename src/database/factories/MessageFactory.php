<?php

namespace Database\Factories;

use App\Models\Chat;
use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class MessageFactory extends Factory
{
    protected $model = Message::class;
    public function definition(): array
    {
        return [
            'user_id' => User::first(),
            'chat_id' => Chat::first(),
            'message' => fake()->text()
        ];
    }
}
