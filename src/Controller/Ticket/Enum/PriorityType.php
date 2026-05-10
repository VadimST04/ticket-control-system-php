<?php

declare(strict_types=1);

namespace App\Controller\Ticket\Enum;

enum PriorityType: string
{
    case HIGH = 'high';
    case MIDDLE = 'middle';
    case LOW = 'low';
}
