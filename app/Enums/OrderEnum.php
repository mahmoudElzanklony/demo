<?php

namespace App\Enums;

enum OrderEnum : string
{
    case Shipped = 'Shipped';
    case Completed = 'Completed';
}
