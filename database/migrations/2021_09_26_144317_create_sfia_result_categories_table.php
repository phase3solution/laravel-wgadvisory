<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSfiaResultCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sfia_result_categories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sfia_result_id')->unsigned();
            $table->foreign('sfia_result_id')->references('id')->on('sfia_results')->onDelete('cascade');
           
            $table->bigInteger('sfia_category_id')->nullable();
            $table->bigInteger('sfia_subcategory_id')->nullable();
            $table->bigInteger('sfia_skill_id')->nullable();
            $table->string('code')->nullable();
            $table->string('rank')->nullable();
            $table->string('target')->nullable();
            $table->string('evaluation')->nullable();

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
        Schema::dropIfExists('sfia_result_categories');
    }
}
