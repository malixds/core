<?php

namespace App\Repositories;

use App\Interfaces\IPostRepository;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class   PostRepository implements IPostRepository
{

    public function create(array $data): Post
    {
       return Post::query()->create($data);
    }

    public function update(array $data): void
    {
        Post::query()->update($data);
    }

    public function delete(int $id): void
    {
        Post::query()->find($id)->delete();
    }

    public function find(int $id): ?Post
    {
        return Post::query()->find($id);
    }
    public function get(): Collection
    {
        return Post::query()->get();
    }

    public function insert(array $data): void
    {
        DB::table('post_accept')->insert($data);
    }
}
