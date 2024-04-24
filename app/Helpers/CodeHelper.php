<?php

namespace App\Helpers;

class CodeHelper
{
    public static function generateRandomCode()
    {
        return str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
    }
}
