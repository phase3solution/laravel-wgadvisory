<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBcpAssessmentResultsTable extends Migration
{
    
    public function up()
    {
        Schema::create('bcp_assessment_results', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('assessment_id');
            $table->bigInteger('company_id');
            $table->double('average', 8,2)->default(0.0)->nullable();
            $table->text('summary')->nullable();
            $table->text('historical_evidence')->nullable();
            $table->text('asset_codes')->nullable();
            $table->text('vulnerability_codes')->nullable();
            $table->integer('vulnerability')->default(1)->nullable();
            $table->integer('impact')->default(1)->nullable();
            $table->integer('probability')->default(1)->nullable();
            $table->integer('risk')->default(0)->nullable();
            $table->longText('comment')->nullable();
            $table->integer('status')->nullable();
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('bcp_assessment_results');
    }
}
