<?php

namespace App\Dto\User;

class FormCreateUserDto
{

    public function __construct(
        readonly public int    $userId,
        readonly public array  $subjectsArr,
//        readonly public string $name,
        readonly public string $description,
//        readonly public string $email,
        readonly public string $contactLink,
    )
    {
    }

    public function getData()
    {
        return [
//            'user_id' => $this->userId,
//            'subjects_arr' => $this->subjectsArr,
//            'name' => $this->name,
            'description' => $this->description,
//            'email' => $this->email,
            'contact_link' => $this->contactLink,
        ];
    }
}
