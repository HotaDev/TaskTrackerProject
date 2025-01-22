<?php

namespace App\Enums;

enum Status: string
{
    case UnComplete = 'не выполнена';
    case Complete = 'выполнена';
}
