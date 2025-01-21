<?php

namespace App\Enums;

enum Priority: string
{
    case Low    ='низкий';
    case Middle = 'средний';
    case High   = 'высокий';
}