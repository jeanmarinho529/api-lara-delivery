<?php

namespace Tests\Unit\Helpers;
use App\Helpers\FormartDataHelper;
use PHPUnit\Framework\TestCase;

class FormartDataHelperTest extends TestCase
{
    public function testFormatCnpjForHuman(): void
    {
        $result = FormartDataHelper::formartCnpj('00000000000100');

        $this->assertEquals('00.000.000/0001-00', $result);
    }

    public function testFormatCpfForHuman(): void
    {
        $result = FormartDataHelper::formartCpf('00000000000');

        $this->assertEquals('000.000.000-00', $result);
    }

    public function testFormatPhoneForHumanNumberEleven(): void
    {
        $result = FormartDataHelper::formartPhone('84900000000');

        $this->assertEquals('(84) 90000-0000', $result);
    }

    public function testFormatPhoneForHumanNumberTen(): void
    {
        $result = FormartDataHelper::formartPhone('8400000000');

        $this->assertEquals('(84) 0000-0000', $result);
    }
}
