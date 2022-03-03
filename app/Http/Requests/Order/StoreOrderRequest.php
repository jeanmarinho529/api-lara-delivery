<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'external_number' => 'required|string|max:255',
            'client.name' => 'required|string|min:4|max:150',
            'client.phone' => 'nullable|string|min:10|max:11',
            'client.lat' => 'required|string|max:100',
            'client.long' => 'required|string|max:100',
            'origin.lat' => 'required|string|max:100',
            'origin.long' => 'required|string|max:100',
            'note' => 'nullable|string|max:255',
        ];
    }
}
