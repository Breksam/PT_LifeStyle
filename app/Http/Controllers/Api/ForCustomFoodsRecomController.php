<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ForCustomFood;
use App\Http\Requests\ForCustomFoodsRecomRequest;
use App\Http\Requests\Auth\LoginRequest;
use Auth;


class ForCustomFoodsRecomController extends Controller
{
    public function storeForCustomFoods(ForCustomFoodsRecomRequest $request){
        
        $newcustomfood = $request->validated();
       

        $ex_diet = ForCustomFood::where('user_id', $newcustomfood['user_id'])->first();

        if(is_null($ex_diet)){
            $diet = ForCustomFood::create($newcustomfood);

            $success['id'] = $diet->id;
            $success['calories'] = $diet->calories;
            $success['fatContent'] = $diet->fatContent;
            $success['satuatedfatContent'] = $diet->satuatedfatContent;
            $success['cholesterolContent'] = $diet->cholesterolContent;
            $success['sodiumContent'] = $diet->sodiumContent;
            $success['carbohydrateContent'] = $diet->carbohydrateContent;
            $success['fiberContent'] = $diet->fiberContent;
            $success['sugarContent'] = $diet->sugarContent;
            $success['proteinContent'] = $diet->proteinContent;
            $success['numberOfRecommendations'] = $diet->numberOfRecommendations;


            $specifyingIngredients = explode(';', $diet->specifyingIngredients);

            $success['specifyingIngredients'] = $specifyingIngredients;
            $success['user_id'] = $diet->user_id;
            $success['success'] = "Your Diet Recommended successfully";
            return response()->json($success, 200);
        }else{
            // update
            $ex_diet->update($newcustomfood);
            $ex_diet->refresh();

            $success['id'] = $ex_diet->id;
            $success['calories'] = $ex_diet->calories;
            $success['fatContent'] = $ex_diet->fatContent;
            $success['satuatedfatContent'] = $ex_diet->satuatedfatContent;
            $success['cholesterolContent'] = $ex_diet->cholesterolContent;
            $success['sodiumContent'] = $ex_diet->sodiumContent;
            $success['carbohydrateContent'] = $ex_diet->carbohydrateContent;
            $success['fiberContent'] = $ex_diet->fiberContent;
            $success['sugarContent'] = $ex_diet->sugarContent;
            $success['proteinContent'] = $ex_diet->proteinContent;
            $success['numberOfRecommendations'] = $ex_diet->numberOfRecommendations;

            $specifyingIngredients = explode(';', $ex_diet->specifyingIngredients);

            $success['specifyingIngredients'] =  $specifyingIngredients;
            $success['user_id'] = $ex_diet->user_id;

            $success['success'] = "Your Diet Recommended successfully";
            return response()->json($success, 200);
        }
    }



    public function showForCustomFoods($id){
        $diet = ForCustomFood::get()->where('user_id' , $id)->first();
        if(is_null($diet))
            return response()->json(["error"=> 'Not found data for This User!']);
        else
            return response()->json($diet,200);
    }

    public function showAllForCustomFoods(){
        $diets = ForCustomFood::get();

        if(is_null($diets))
            return response()->json(["error"=> 'Not found any Data!']);
        else
            return response()->json($diets,200);
    }
}
