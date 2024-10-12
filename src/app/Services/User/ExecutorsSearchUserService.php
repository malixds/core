<?php

namespace App\Services\User;

use App\Dto\User\ExecutorsSearchUserDto;
use App\Enums\UserRolesEnum;
use App\Models\Subject;
use App\Models\User;

class ExecutorsSearchUserService
{
    public function run($subjectsFromRequest): array
    {
        $executors = User::with('roles', 'subjects')
            ->whereHas('roles', function ($query) {
                $query->where('slug', UserRolesEnum::WORKER->value);
            });

        if (!empty($subjectsFromRequest)) {
            $executors->whereHas('subjects', function ($query) use ($subjectsFromRequest) {
                $query->whereIn('name', $subjectsFromRequest);
            });
        }

        return [
            'executors' => $executors->get(),
            'subjects' => Subject::get(),
            'user' => auth()->user()
        ];
    }
}
