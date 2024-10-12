<?php

namespace App\Services\User;

use App\Models\Subject;
use App\Models\User;

class ExecutorsUserService
{
    public function run(): array
    {
        $executors = User::whereHas('roles', function ($query) {
            $query->where('slug', 'worker');
        })->with('subjects')->get();
        return [
            'executors' => $executors,
            'subjects' => Subject::get(),
            'user' => auth()->user(),
        ];
    }
}
