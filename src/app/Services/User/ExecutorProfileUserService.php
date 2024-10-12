<?php

namespace App\Services\User;

use App\Models\User;

class ExecutorProfileUserService
{
    public function run(int $id): bool
    {
        $executorsId = User::whereHas('roles', function ($query) {
            $query->where('slug', 'worker');
        })->pluck('id')->toArray();
        if (in_array($id, $executorsId)){
            return true;
        } else {
            return false;
        }
    }
}
