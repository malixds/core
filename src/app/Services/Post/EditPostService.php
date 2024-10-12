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
    ) {
        $this->repository = $repository;
    }
    public function run(Post $post, EditPostDto $dto): Post
    {
        $post->$this->repository->update($dto->getData());

        return $post;
    }

}
