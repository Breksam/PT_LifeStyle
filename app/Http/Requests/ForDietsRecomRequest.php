<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForDietsRecomRequest extends FormRequest
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
            'age'                => 'required|integer|min:2',
            'height'             => 'required|integer|min:50',
            'weight'             => 'required|integer|min:10',
            'gender'             => 'required|in:male,female',
            'physical_activity'  => 'required|in:Little/no exercise,Light exercise,Moderate exercise (3-5 days/wk),very active (6-7 days/wk),Extra active (very active & physical job)',
            'weight_loss_plan'   => 'required|in:Maintain weight,Mild weight loss,Weight loss,Extreme weight loss',
            'meals'              => 'required|in:3, 4, 5',
            'user_id'            => 'required',
        ];
    }

}