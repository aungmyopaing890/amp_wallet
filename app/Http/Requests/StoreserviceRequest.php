<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreserviceRequest extends FormRequest
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
            "img"=>"nullable",
            "description"=>"required|string",
            "status"=>"nullable",
            "price"=>"required",
            "sorting"=>"required",
            "service_type_id"=>"required",

        ];
    }
}
