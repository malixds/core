<?php

namespace App\Dto\Post;

class EditPostDto
{
    public function __construct(
        public readonly string $subjectId,
        public readonly string $title,
        public readonly string $description,
        public readonly int    $price,
        public readonly string $deadline,
    )
    {
    }

    public function getData(): array
    {
        return [
            'subject_id'   => $this->subjectId,
            'title'       => $this->title,
            'description' => $this->description,
            'price'       => $this->price,
            'deadline'    => $this->deadline,
        ];
    }
}
