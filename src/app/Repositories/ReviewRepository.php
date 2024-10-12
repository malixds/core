<?php

namespace App\Repositories;


use App\Interfaces\IReviewRepository;
use App\Models\Review;

class ReviewRepository implements IReviewRepository
{
    public function create(array $data): void
    {
        Review::query()->create($data);
    }
}
