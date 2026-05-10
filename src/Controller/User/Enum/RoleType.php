<?php

declare(strict_types=1);

namespace App\Controller\User\Enum;

enum RoleType: string
{
    case ADMIN = 'ROLE_ADMIN';
    case MANAGER = 'ROLE_MANAGER';
    case EMPLOYEE = 'ROLE_EMPLOYEE';
    case CUSTOMER = 'ROLE_CUSTOMER';
}
