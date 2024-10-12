<?php

namespace App\Dto\Post;

class AcceptPostDto
{
    public function __construct(
        public readonly int $postId,
        public readonly int $userId,
        public readonly int $executorId,
    )
    {

    }

    public function getData(): array
    {
        return [
            'post_id' => $this->postId,
            'user_id' => $this->userId,
            'executor_id' => $this->executorId
        ];
    }
}
