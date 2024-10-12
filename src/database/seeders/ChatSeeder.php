<?php

namespace Database\Seeders;

use App\Models\Chat;
use App\Models\Message;
use App\Models\User;

class ChatSeeder
{
    public function run()
    {
        $chat = Chat::factory()->create();
        $user1 = User::first(); // id = 1 - > maxim
        $user2 = User::skip(1)->first(); // id 2 = -> Tema
        $chat->users()->attach($user1, [
            'created_at' => now()
        ]);
        $chat->users()->attach($user2, [
            'created_at' => now()
        ]);

        for ($i = 0; $i < 5; $i++) {
            Message::factory(10)->create([
                'chat_id' => $chat->id,
                'user_id' => $i % 2 === 0 ? $user1 : $user2,
            ]);
        }

    }
}
