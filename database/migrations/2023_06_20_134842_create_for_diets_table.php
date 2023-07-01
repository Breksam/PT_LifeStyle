<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('for_diets', function (Blueprint $table) {
            $table->id();
            $table->integer('age');
            $table->integer('height');
            $table->integer('weight');
            $table->string('gender');
            $table->string('physical_activity');
            $table->string('weight_loss_plan');
            $table->integer('meals');
            $table->float('bmi');
            $table->string('bmi_string');
            $table->string('bmi_category');
            $table->string('bmi_color');
            $table->float('bmr');
            $table->float('maintain_calories');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('for_diets_recommendation');
    }
};
