<?php

namespace App\Enums;

enum PostStatusEnum: string
{
    case ACTIVE = 'active'; // просто выложено
    case ACCEPTED = 'accepted'; // откликнулся работник

    case AGREED = 'agreed'; // принял отклик заказчик
    case CONFIRMED = 'confirmed'; // работник говорит что задание выполнено
    case REJECTED = 'rejected'; // отказано

}
