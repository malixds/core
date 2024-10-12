<?php

namespace App\Dto\Chat;

class CreateChatDto
{
    public function __construct(
        public readonly int $userId,
        public readonly int $buddyId,
    )
    {
    }
    public function getData()
    {
        return [
        'user_id' => $this->userId,
        'buddy_id' => $this->buddyId,
        ];
    }
}
