<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCybersecurityMaturityRegisterResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cybersecurity_maturity_register_results', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('assessment_id');
            $table->bigInteger('company_id');

            $table->integer('maturity_rating')->default(0)->nullable();
            $table->longText('action_plan')->nullable();
            $table->integer('priority')->default(1)->nullable();
            $table->longText('accountable')->nullable();

            $table->integer('response')->nullable()->default(0);
            $table->longText('comment')->nullable();

            $table->longText('summary1')->nullable();
            $table->longText('summary2')->nullable();



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
        Schema::dropIfExists('cybersecurity_maturity_register_results');
    }
}
