<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ForDiet extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
            'age',
            'height',
            'weight',
            'gender',
            'physical_activity',
            'weight_loss_plan',
            'meals',
            'bmi',
            'bmi_string',
            'bmi_category',
            'bmi_color',
            'bmr',
            'maintain_calories',
            'user_id',
    ];
}
