<?php

namespace App\Http\Requests;

use App\Models\TransactionLimit;
use App\Rules\DailyLimit;
use Illuminate\Foundation\Http\FormRequest;

class WithdrawTransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "wallet_id"=>"required|string",
            "amount"=>'required|numeric',
        ];
    }
}
