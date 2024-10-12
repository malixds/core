<?php

namespace App\Dto\User;

class ExecutorsSearchUserDto
{
    public function __construct(
        readonly public array $subjectsFromRequest,
    )
    {
    }
    public function get(): array
    {
        return [
            'subjects_request'  => $this->subjectsFromRequest,
        ];
    }
}
