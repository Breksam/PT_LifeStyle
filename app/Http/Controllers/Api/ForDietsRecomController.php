<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ForDiet;
use App\Http\Requests\ForDietsRecomRequest;
use Illuminate\Support\Facades\Auth;


class ForDietsRecomController extends Controller
{
    public function storeForDiets(ForDietsRecomRequest $request){

        $newdiet = $request->validated();

            $ex_diet = ForDiet::where('user_id',$newdiet['user_id'])->first();

            // calculate BMI
            $newdiet['bmi'] = round($newdiet['weight'] / (($newdiet['height']/100)**2),2);
            
    
            // to display BMI value, category, color
            $newdiet['bmi_string'] = $newdiet['bmi'].' kg/m²';
    
            if($newdiet['bmi'] < 18.5){

                $newdiet['bmi_category'] = 'Underweight';
                $newdiet['bmi_color'] = 'Red';

            }elseif(18.5 <= $newdiet['bmi'] && $newdiet['bmi'] < 25){

                $newdiet['bmi_category'] = 'Normal';
                $newdiet['bmi_color'] = 'Green';

            }elseif(25 <= $newdiet['bmi'] && $newdiet['bmi'] < 30){

                $newdiet['bmi_category'] = 'Overweight';
                $newdiet['bmi_color'] = 'Yellow';

            }else{

                $newdiet['bmi_category'] = 'Obesity';
                $newdiet['bmi_color'] = 'Red';

            }
    
            // calculate BMR
            if($newdiet['gender'] == "male"){
                $newdiet['bmr'] = 10 * $newdiet['weight']+6.25 * $newdiet['height']-5 * $newdiet['age']+5;
            }else{
                $newdiet['bmr'] = 10 *$newdiet['weight']+6.25 * $newdiet['height']-5 * $newdiet['age']+161;
            }
    
            
            if($newdiet['physical_activity'] == 'Little/no exercise'){
                $newdiet['maintain_calories'] =  $newdiet['bmr'] * 1.2;
    
            }elseif($newdiet['physical_activity'] == 'Light exercise'){
                $newdiet['maintain_calories'] =  $newdiet['bmr'] * 1.375;
    
            }elseif($newdiet['physical_activity'] == 'Moderate exercise (3-5 days/wk)'){
                $newdiet['maintain_calories'] =  $newdiet['bmr'] * 1.55;           
    
            }elseif($newdiet['physical_activity'] == 'Very active (6-7 days/wk)'){
                $newdiet['maintain_calories'] =  $newdiet['bmr'] * 1.725;
    
            }elseif($newdiet['physical_activity'] == 'Extra active (very active & physical job)'){
                $newdiet['maintain_calories'] =  $newdiet['bmr'] * 1.9;
    
            }


            if(is_null($ex_diet)){

                // insert
                $diet = ForDiet::create($newdiet);

                $success['id'] = $diet->id;
                $success['age'] = $diet->age;
                $success['height'] = $diet->height;
                $success['weight'] = $diet->weight;
                $success['gender'] = $diet->gender;
                $success['physical_activity'] = $diet->physical_activity;
                $success['weight_loss_plan'] = $diet->weight_loss_plan;
                $success['meals'] = $diet->meals;
                $success['bmi'] = $diet->bmi;
                $success['bmi_string'] = $diet->bmi_string;
                $success['bmi_category'] = $diet->bmi_category;
                $success['bmi_color'] = $diet->bmi_color;
                $success['bmr'] = $diet->bmr;
                $success['maintain_calories'] = $diet->maintain_calories;
                $success['user_id'] = $diet->user_id;
                $success['success'] = "Your Diet Recommended successfully";
                return response()->json($success, 200);


            }else{

                // update
                $ex_diet->update($newdiet);
                $ex_diet->refresh();

                $success['id'] = $ex_diet->id;
                $success['age'] = $ex_diet->age;
                $success['height'] = $ex_diet->height;
                $success['weight'] = $ex_diet->weight;
                $success['gender'] = $ex_diet->gender;
                $success['physical_activity'] = $ex_diet->physical_activity;
                $success['weight_loss_plan'] = $ex_diet->weight_loss_plan;
                $success['meals'] = $ex_diet->meals;
                $success['bmi'] = $ex_diet->bmi;
                $success['bmi_string'] = $ex_diet->bmi_string;
                $success['bmi_category'] = $ex_diet->bmi_category;
                $success['bmi_color'] = $ex_diet->bmi_color;
                $success['bmr'] = $ex_diet->bmr;
                $success['maintain_calories'] = $ex_diet->maintain_calories;
                $success['user_id'] = $ex_diet->user_id;
                $success['success'] = "Your Diet Recommended successfully";
                return response()->json($success, 200);
            }
    }


    public function showForDiets($id){
        $diet = ForDiet::get()->where('user_id' , $id)->first();

        if(is_null($diet))
            return response()->json(["error"=> 'Not found data for This User!']);
        else
            return response()->json($diet, 200);
    }

     public function showAllForDiets(){
        $diets = ForDiet::get()->all();
        
        if(is_null($diets))
            return response()->json(["error"=> 'Not found any Data!']);
        else
            return response()->json($diets,200);
    }
}
