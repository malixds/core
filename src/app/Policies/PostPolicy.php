<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Post $post): bool
    {
        return $post->user_id === $user->id || $user->isAdmin();
    }

    public function delete(User $user, Post $post): bool
    {
        return $post->user_id === $user->id || $user->isAdmin();
    }

//    public function accept(User $user): bool
//    {
//        return $user->isAdmin() || $user->isWorker();
//    }
}
