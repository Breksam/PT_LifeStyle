<?php

namespace App\Http\Requests\Admin\Roles;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\AuthorizeCheck;

class RolesUpdateRequest extends FormRequest
{
    use AuthorizeCheck;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {   
        $this->authorizeCheck('settings edit');        
        return true;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $role_id = $this->route('role-permission');
        return [
            'permissions' => ['required'],
            'permissions[*]' => ['exists:permissions, name'],
            'role' => ['required', 'unique:roles,name,'. $role_id, 'max:10']
        ];
    }
}
