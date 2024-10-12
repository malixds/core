<?php

namespace App\Services\Post;

use App\Dto\Post\AcceptPostDto;
use App\Enums\PostStatusEnum;
use App\Models\Post;
use Exception;
use Illuminate\Support\Facades\DB;

class AcceptPostService
{
    /**
     * @throws Exception
     */
    public function run(AcceptPostDto $dto, Post $post): Post
    {
        if ($this->hasAlreadyAccepted($post->id, $dto->executorId)) {
            throw new Exception('Вы уже приняли данную заявку');
        }
        if (!$this->isNotOwner($dto)) {
            throw new Exception('Вы не можете принять данную заявку');
        }
        if ($post->status !== PostStatusEnum::ACTIVE->value && $post->status !== PostStatusEnum::ACCEPTED->value) {
            throw new Exception('Эту заявку уже выполняет другой человек');
        }
        DB::table('post_accept')->insert($dto->getData());
        $post->increment('responce', 1);
        $post->status = PostStatusEnum::ACCEPTED->value;
        return $post;
    }

    private function hasAlreadyAccepted(int $postId, int $executorId): bool
    {
        return DB::table('post_accept')
            ->where('post_id', $postId)
            ->where('executor_id', $executorId)
            ->exists();
    }

    private function isNotOwner(AcceptPostDto $dto): bool
    {
        return $dto->userId !== $dto->executorId;
    }

}
