<?php

namespace App\Repositories;

use App\Interfaces\IUserRepository;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements IUserRepository
{

    public function create(array $data): void
    {
        // TODO: Implement create() method.
        User::query()->create($data);
    }

    public function update(int $id, array $data): void
    {
        User::whereId($id)->update($data);
    }
    public function find(int $id): ?User
    {
        return User::query()->find($id);
    }

    public function get(): Collection
    {
        return User::query()->get();
    }
}
