<?php

namespace App\Dto\Post;

class CreatePostDto
{
    public function __construct(
        public readonly int $subjectId,
        public readonly string $userId,
        public readonly string $title,
        public readonly string $description,
        public readonly int    $price,
        public readonly string $deadline,
    )
    {
    }

    public function getData()
    {
        return [
            'subject_id' => $this->subjectId,
            'user_id' => $this->userId,
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'deadline' => $this->deadline,
        ];
    }

}
