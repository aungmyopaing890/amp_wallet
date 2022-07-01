<?php


namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            "name" => "required|string",
            "nrc" => "required",
            "fullName" => "required|string",
            "email" => "required|string",
            "password" => "required|string",
            "address" => "required|string",
            "dob" => "required",
            "phoneNumber" => "required",
            "role_id" => "required",
            "currency_id" => "nullable",
            'imgPath' => 'nullable|mimes:jpeg,png,jpg,gif',
        ];

    }
}
