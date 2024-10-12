<?php

namespace App\Services\Chat;
use App\Http\Requests\MessageFormRequest;

use App\Dto\Chat\SendMessageDto;
use App\Models\Chat;
use App\Models\Message;

class SendMessageService
{
    public function run(SendMessageDto $dto, MessageFormRequest $request, int $id): \Illuminate\Http\JsonResponse | \App\Models\Message
    {
        {
            $chat = auth()->user()->allChats()->find($id);
            if ($chat) {
                $message = new Message($dto->getData() + $request->validated());
                $chat->messages()->save($message);
                return $message;
            } else {
                return response()->json(['error' => 'Chat not found'], 404);
            }
        }
    }

}
