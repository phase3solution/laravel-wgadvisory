<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBcpRegisterResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bcp_register_results', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('assessment_id');
            $table->bigInteger('company_id');

            $table->text('asset_codes')->nullable();
            $table->text('vulnerability_codes')->nullable();

            $table->string("risk_owner")->nullable();

          

            $table->integer('inherent_vulnerability')->default(1)->nullable();
            $table->integer('inherent_impact')->default(1)->nullable();
            $table->integer('inherent_probability')->default(1)->nullable();
            
            $table->integer('risk')->default(0)->nullable();

            $table->text('summary')->nullable();
            $table->text('historical_evidence')->nullable();
            $table->longText('controls')->nullable();

            $table->string('avoid')->nullable();
            $table->string('mitigate')->nullable();
            $table->string('accept')->nullable();
            $table->string('transfer')->nullable();




            $table->integer('residual_vulnerability')->default(1)->nullable();
            $table->integer('residual_impact')->default(1)->nullable();
            $table->integer('residual_probability')->default(1)->nullable();
            $table->text('notes')->nullable();
            


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
        Schema::dropIfExists('bcp_register_results');
    }
}
