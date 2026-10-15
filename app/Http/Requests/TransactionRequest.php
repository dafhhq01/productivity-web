<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'type' => 'required|in:income,expense',
            'category' => 'required|in:gaji,makan,transport,belanja,tagihan,hiburan,pendidikan,lainnya',
            'amount' => 'required|numeric|gt:0|max:999999999999',
            'transaction_date' => 'required|date',
            'note' => 'nullable|string',
        ];
    }
}
