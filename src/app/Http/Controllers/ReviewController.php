<?php

namespace App\Http\Controllers;

use App\Dto\Review\ReviewSendDto;
use App\Enums\ReviewEnum;
use App\Models\Review;
use App\Models\User;
use App\Repositories\ReviewRepository;
use Illuminate\Http\Request;

class ReviewController
{
    protected ReviewRepository $repository;
    public function __construct(ReviewRepository $repository)
    {
        $this->repository = $repository;
    }

    public function reviewSend(Request $request, User $executor)
    {
        $dto = new ReviewSendDto(
            reviewerId: auth()->user()->id,
            reviewedId: $executor->id,
            comment: $request->input(ReviewEnum::REVIEW->value),
            reviewableType: ReviewEnum::REVIEW->value,
            createdAt: now(),
            updatedAt: now(),
        );
        $this->repository->create($dto->getData());

        return redirect()->back();
    }

}
