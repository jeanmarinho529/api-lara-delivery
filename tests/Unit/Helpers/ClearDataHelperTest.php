<?php

namespace Tests\Unit\Helpers;

use App\Helpers\ClearDataHelper;
use PHPUnit\Framework\TestCase;

class ClearDataHelperTest extends TestCase
{
    public function testDontClearPhoneNumber(): void
    {
        $phoneNumber = '84900000000';
        $result = ClearDataHelper::clearAttribute($phoneNumber);

        $this->assertEquals($phoneNumber, $result);
    }

    public function testClearPhoneNumber(): void
    {
        $phoneNumber = '+55 (84) 90000-0000';
        $result = ClearDataHelper::clearAttribute($phoneNumber);

        $this->assertEquals('5584900000000', $result);
    }

    public function testClearText(): void
    {
        $text = 'look, these characters should be stripped (+).,-;:/@';
        $result = ClearDataHelper::clearAttribute($text);

        $this->assertEquals('lookthesecharactersshouldbestripped', $result);
    }

    public function testClearDataNull(): void
    {
        $result = ClearDataHelper::clearAttribute(null);

        $this->assertEquals('', $result);
    }
}
