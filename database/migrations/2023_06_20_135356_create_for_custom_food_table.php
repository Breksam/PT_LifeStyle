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
        Schema::create('for_custom_food', function (Blueprint $table) {
            $table->id();
            $table->integer('calories');
            $table->integer('fatContent');
            $table->integer('satuatedfatContent');
            $table->integer('cholesterolContent');
            $table->integer('sodiumContent');
            $table->integer('carbohydrateContent');
            $table->integer('fiberContent');
            $table->integer('sugarContent');
            $table->integer('proteinContent');
            $table->integer('numberOfRecommendations');
            $table->text('specifyingIngredients');
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
        Schema::dropIfExists('for_custom_foods_recommendation');
    }
};
