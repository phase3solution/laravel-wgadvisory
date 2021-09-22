<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCybersecurityMaturityResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cybersecurity_maturity_results', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('assessment_id');
            $table->bigInteger('company_id');

            $table->double('function_average', 8,2)->default(0.0)->nullable();
            $table->double('category_average', 8,2)->default(0.0)->nullable();
            $table->double('maturity_rating', 8,2)->default(0.0)->nullable();

            $table->integer('response')->default(0)->nullable();
            $table->integer('score')->default(0)->nullable();
            $table->longText('comment', 8,2)->default(0.0)->nullable();




            $table->integer('status')->nullable();
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
        Schema::dropIfExists('cybersecurity_maturity_results');
    }
}
