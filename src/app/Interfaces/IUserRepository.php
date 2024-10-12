<?php

namespace App\Interfaces;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface IUserRepository
{
    public function create(array $data): void;
    public function update(int $id, array $data): void;
    public function find(int $id): ?User;
    public function get(): Collection;
}
