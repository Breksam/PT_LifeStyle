<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForCustomFood extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'calories'             ,
        'fatContent'           ,
        'satuatedfatContent'   ,
        'cholesterolContent'   ,
        'sodiumContent'        ,
        'carbohydrateContent'  ,
        'fiberContent'         ,
        'sugarContent'         ,
        'proteinContent'       ,
        'numberOfRecommendations' ,
        'specifyingIngredients',
        'user_id'              ,
    ];
}
