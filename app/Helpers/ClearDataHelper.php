<?php

namespace App\Helpers;

class ClearDataHelper
{
    public static function clearAttribute(string $param): string
    {
        $itemsRemoved = ['(', ')', '.', ',', '-', '+', ';', ':', '/', '@', ' '];
        return str_replace($itemsRemoved, "", $param);
    }
}
