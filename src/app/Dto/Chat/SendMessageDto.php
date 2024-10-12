<?php

namespace App\Dto\Chat;

class SendMessageDto
{
    public function __construct(
        public readonly int $chatId,
        public readonly int $userId,
        public readonly string $message,
    ) {}

    public function getData(): array
    {
        return [
            'chat_id' => $this->chatId,
            'user_id' => $this->userId,
            'message' => $this->message
        ];
    }
}
