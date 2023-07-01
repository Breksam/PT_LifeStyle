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
            'calories' => 'required',
            'fatContent' => 'required',
            'satuatedfatContent' => 'required',
            'cholesterolContent' => 'required',
            'sodiumContent' => 'required',
            'carbohydrateContent' => 'required',
            'fiberContent' => 'required',
            'sugarContent' => 'required',
            'proteinContent' => 'required',
            'numberOfRecommendations' => 'required|in:5, 10, 15, 20',
            'specifyingIngredients' => 'required',
            'user_id' => 'required',
        ];
    }
}