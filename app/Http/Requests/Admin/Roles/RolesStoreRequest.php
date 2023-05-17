<?php

namespace App\Http\Requests\Admin\Roles;

use Illuminate\Foundation\Http\FormRequest;

class RolesStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->user()->can('settings edit')){return true;}
        return false;
    }

    protected function failedAuthorization(){
        return "Only Admin Can Access That";
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
       
        return [
            'permissions' => ['required'],
            'permissions[*]' => ['exists:permissions'],
            'role' => ['required', 'unique:roles,name', 'max:60']
        ];
    }
}
