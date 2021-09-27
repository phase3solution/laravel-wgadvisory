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
     
            $table->bigInteger('company_id')->nullable();
            $table->bigInteger('sfia_id')->nullable();

            $table->bigInteger('sfia_user_id')->nullable();
            $table->bigInteger('sfia_team_id')->nullable();
            $table->bigInteger('sfia_name_role_id')->nullable();

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
