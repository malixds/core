<?php

namespace App\Dto\User;

class FormDeleteSubjectDto
{
    public function __construct(
        readonly public int $userId,
        readonly public int $userSubjectId,
    )
    {
    }
    public function getData()
    {
        return [
            'user_id'=>$this->userId,
            'subject_id'=> $this->userSubjectId,
        ];
    }
}
