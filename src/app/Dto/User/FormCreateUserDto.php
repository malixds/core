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
        readonly public string $cardNumber,
    )
    {
    }

    public function getData()
    {
        return [
//            'subjects_arr' => $this->subjectsArr,
            'description' => $this->description,
            'contact_link' => $this->contactLink,
            'card_number' => $this->cardNumber,
        ];
    }
}
