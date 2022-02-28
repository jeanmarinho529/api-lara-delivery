<?php

namespace App\Traits;

use App\Helpers\ClearDataHelper;
use App\Helpers\FormartDataHelper;

trait PhoneModelTrait
{
    public function setPhoneAttribute(string $value): void
    {
        if (array_key_exists('phone', $this->attributes)) {
            $this->attributes['phone'] = ClearDataHelper::clearAttribute($value);
        }
    }

    public function setClientPhoneAttribute(?string $value): void
    {
        if (array_key_exists('client_phone', $this->attributes)) {
            $this->attributes['client_phone'] = ClearDataHelper::clearAttribute($value);
        }
    }

    public function getDisplayPhoneAttribute(): string
    {
        return FormartDataHelper::formartPhone($this->verifyAttributePhone());
    }

    private function verifyAttributePhone(): string
    {
        $phone = '';
        if (isset($this->phone)) {
            $phone = $this->phone;
        } elseif (isset($this->client_phone)) {
            $phone = $this->client_phone;
        }

        return $phone;
    }
}
