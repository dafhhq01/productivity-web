<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvestmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'amount_invested' => 'required|numeric|gt:0|max:999999999999',
            'annual_rate' => 'required|numeric|min:0|max:100',
            'start_date' => 'required|date|before_or_equal:today',
        ];
    }
}
