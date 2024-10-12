<?php

namespace App\Services\User;

use App\Dto\User\FormDeleteSubjectDto;
use Illuminate\Support\Facades\DB;

class FormDeleteSubjectUserService
{
    public function run(FormDeleteSubjectDto $dto): void
    {
        DB::table('user_subjects')
            ->where('user_id', $dto->userId)
            ->where('subject_id', $dto->userSubjectId)
            ->delete();
    }
}
