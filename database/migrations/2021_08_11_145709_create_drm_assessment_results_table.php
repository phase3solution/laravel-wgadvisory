<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrmAssessmentResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drm_assessment_results', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('assessment_id');
            $table->bigInteger('company_id');
            $table->integer('total')->default(0)->nullable();
            $table->double('average', 8,2)->default(0.0)->nullable();
            $table->integer('answer')->default(0)->nullable();
            $table->longText('comment')->nullable();
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
        Schema::dropIfExists('drm_assessment_results');
    }
}
