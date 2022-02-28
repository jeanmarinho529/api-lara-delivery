<?php

namespace App\Helpers;

class FormartDataHelper
{
    public static function formartCnpj(?string $param): string
    {
        return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $param);
    }

    public static function formartCpf(?string $param): string
    {
        return preg_replace("/(\d{3})(\d{3})(\d{3})/", "\$1.\$2.\$3-", $param);
    }

    public static function formartPhone(?string $param): string
    {
        $value = strlen($param) === 10 ? '\d{4}' : '\d{5}';
        return preg_replace("/(\d{2})($value)(\d{4})/", "(\$1) \$2-\$3", $param);
    }
}
