<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\AuthorizeCheck;

class UserUpdateRequest extends FormRequest
{
    use AuthorizeCheck;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $this->authorizeCheck('users edit');
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        // $user = $this->route('user');
        return [
            'first_name' => 'required|max:15',
            'last_name'  => 'required|max:15',
            'email' => 'required|email',
            'password'   => 'required|confirmed|min:6',
            'gender'     => 'sometimes|in:male,female',
            'birth_date' => 'sometimes|date_format:Y-m-d',
            'image'      => ['image', 'mimes:jpg,png,jpeg,webp','max:2048'],
            'role'       => ['required', 'unique:roles,name', 'max:10']
        ];
    }
}

