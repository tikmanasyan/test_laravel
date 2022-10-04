<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            "full_name" => "required|min:4",
            "birth_date" => "date",
            "gender" => "required",
            "avatar" => "required|image|mimes:jpg,jpeg,png",
            "email" => "required|email",
            "password" => "required|min:4",
        ];
    }
}
