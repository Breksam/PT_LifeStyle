<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForCustomFoodsRecomRequest extends FormRequest
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
            'calories' => 'required|integer|min:0|max:2000',
            'fatContent' => 'required|integer|min:0|max:100',
            'satuatedfatContent' => 'required|integer|min:0|max:13',
            'cholesterolContent' => 'required|integer|min:0|max:300',
            'sodiumContent' => 'required|integer|min:0|max:2300',
            'carbohydrateContent' => 'required|integer|min:0|max:325',
            'fiberContent' => 'required|integer|min:0|max:50',
            'sugarContent' => 'required|integer|min:0|max:40',
            'proteinContent' => 'required|integer|min:0|max:40',
            'numberOfRecommendations' => 'required|in:5, 10, 15, 20',
            'specifyingIngredients' => 'required',
            'user_id' => 'required',
        ];
    }
}