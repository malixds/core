<?php

namespace App\Repositories;

use App\Interfaces\IChatRepository;
use App\Models\Chat;
use App\Models\Message;

class ChatRepository implements IChatRepository
{

    public function create(): \Illuminate\Database\Eloquent\Model|Chat
    {
        return Chat::create();
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    public function find(int $id): Chat
    {
        return Chat::find($id);
    }

    public function get(): \Illuminate\Database\Eloquent\Collection|array
    {
        return Chat::query()->get();
    }

    public function getWithUser(Chat $chat): \Illuminate\Database\Eloquent\Collection
    {
        return $chat->messages()->with('user')->get();
    }

    public function getMessageWithUser($id)
    {
        return Message::query()
            ->with('user')
            ->where('chat_id', $id)
            ->get();

    }

}
