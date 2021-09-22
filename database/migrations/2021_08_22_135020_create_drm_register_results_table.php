<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrmRegisterResultsTable extends Migration
{
   
    public function up()
    {
        Schema::create('drm_register_results', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('assessment_id');
            $table->bigInteger('company_id');

            $table->longText('description')->nullable();
            $table->text('owner')->nullable();

            $table->text('last_assessment')->nullable();
            $table->integer('rating')->nullable();
            $table->longText('recommendation')->nullable();
            
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->longText('notes')->nullable();
            $table->integer('target')->nullable();

            $table->integer('status')->nullable();
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by')->nullable();

            $table->timestamps();
        });
    }

 
    public function down()
    {
        Schema::dropIfExists('drm_register_results');
    }
}
