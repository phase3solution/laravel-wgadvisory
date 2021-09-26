<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSfiaResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sfia_results', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('company_id')->nullable();
            $table->bigInteger('sfia_id')->nullable();

            $table->bigInteger('sfia_user_id')->nullable();
            $table->bigInteger('sfia_team_id')->nullable();
            $table->bigInteger('sfia_name_role_id')->nullable();
            $table->bigInteger('sfia_title_role_id')->nullable();

            $table->longText('notes')->nullable();
            $table->integer('level')->nullable();
            $table->string('skill_fit')->nullable();
            $table->string('technical_score')->nullable();


            $table->longText('summary_1')->nullable();
            $table->longText('summary_2')->nullable();







            $table->boolean('status')->default(1)->nullable();
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by')->nullable();

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
        Schema::dropIfExists('sfia_results');
    }
}
