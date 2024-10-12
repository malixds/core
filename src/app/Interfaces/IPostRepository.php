<?php

namespace App\Interfaces;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use function Illuminate\Events\queueable;

interface IPostRepository
{
    public function create(array $data): Post;

    public function update(array $data): void;

    public function delete(int $id): void;

    public function find(int $id): ?Post;
    public function get(): Collection;
    public function insert(array $data): void;

}
