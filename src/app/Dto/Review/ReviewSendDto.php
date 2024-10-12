<?php

namespace App\Dto\Review;

use App\Enums\ReviewEnum;
use Date;

class ReviewSendDto
{
    public function __construct(
        public int $reviewerId,
        public int $reviewedId,
        public string $comment,
        public string $reviewableType,
        public $createdAt,
        public $updatedAt
    )
    {
    }
    public function getData(): array
    {
        return [
            'reviewer_id' => $this->reviewerId,
            'reviewed_id' => $this->reviewedId,
            'comment' => $this->comment,
            'reviewable_type' => $this->reviewableType,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt
        ];
    }
}
