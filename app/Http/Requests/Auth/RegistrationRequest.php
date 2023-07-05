<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'first_name' => 'required|string|max:15|regex:/[a-z]/|regex:/[A-Z]/',
            'last_name' => 'required|string|max:15|regex:/[a-z]/|regex:/[A-Z]/',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|confirmed|min:6',
            'gender' => 'sometimes|in:male,female',
        ];
    }
}

