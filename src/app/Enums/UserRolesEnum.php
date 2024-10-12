<?php

namespace App\Enums;

enum UserRolesEnum:string
{
    case ADMIN = 'admin';
    case REGULAR = 'regular';
    case WORKER = 'worker';
}
