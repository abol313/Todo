<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class SignupAuthRequest extends FormRequest
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
            //
            'email'=>'required|max:255|email|unique:users',
            'name'=>'required|string|max:255',
            'password'=>['max:255',Password::min(8)->mixedCase()->letters()->numbers()->symbols()],
            're_password'=>'required|same:password',
            'remember'=>'nullable|boolean',

        ];
    }
}
