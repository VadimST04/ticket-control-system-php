<?php

declare(strict_types=1);

enum RoleType: string
{
    case ADMIN = 'admin';
    case MANAGER = 'manager';
    case EMPLOYEE = 'employee';
    case CUSTOMER = 'customer';
}
