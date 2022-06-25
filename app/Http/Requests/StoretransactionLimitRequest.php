<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoretransactionLimitRequest extends FormRequest
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
            "name"=>"required|string",
            "daily_amount"=>"required|integer",
            "monthly_amount"=>"required|integer",
            "level_id"=>"required",
            "transaction_type_id"=>"required",
            "currency_id"=>"required",
            "description"=>"required",

        ];

    }

}
