<?php

namespace Database\Factories;

use App\Models\Chat;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ChatFactory extends Factory
{
    protected $model = Chat::class;
    public function definition(): array
    {
        return [
//            'id' => fake()->randomNumber(),
        ];
    }
}
