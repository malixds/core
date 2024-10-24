<?php

namespace App\Services\Post;

use App\Dto\Post\EditPostDto;
use App\Models\Post;
use App\Repositories\PostRepository;

class EditPostService
{
    protected $repository;
    public function __construct(
        PostRepository $repository
    )
    {}
    public function run(Post $post, EditPostDto $dto): Post
    {
        return $this->repository->update($dto->getData());
    }

}
