<?php

declare(strict_types=1);

namespace App\Controller\User\Enum;

enum RoleType: string
{
    case ADMIN = 'admin';
    case MANAGER = 'manager';
    case EMPLOYEE = 'employee';
    case CUSTOMER = 'customer';
}
