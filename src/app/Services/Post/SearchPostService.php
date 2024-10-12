<?php

namespace App\Services\Post;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class SearchPostService
{


    public function run($subjectsArr): Collection
    {
        if ($subjectsArr !== null) {
            $posts = Post::with('user.roles', 'subject')
                ->whereHas('subject', function ($query) use ($subjectsArr) {
                    $query->whereIn('name', $subjectsArr);
                })
                ->get();
        } else {
            $posts = Post::with('user.roles', 'subject')->get();
        }
        return $posts;
    }
}
