<?php

namespace App\Services\User;

use App\Dto\User\FormCreateUserDto;
use App\Interfaces\IUserRepository;
use App\Models\Subject;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\DB;

class FormCreateUserService
{

    public function  __construct(
        private UserRepository $userRepository
    )
    {

    }

    public function run(User $user, FormCreateUserDto $dto): void
    {
        $subjects = Subject::whereIn('name', $dto->subjectsArr)->get();
        $user->subjects()->delete();
        foreach ($subjects as $subject) {
            $user->subjects()->attach($subject->id);
        }
        $user->roles()->updateExistingPivot(2, ['role_id' => 3]);
        $this->userRepository->update(
            $user->id,
            $dto->getData()
        );
    }
}
