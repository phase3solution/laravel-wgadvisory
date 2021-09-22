<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiaServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bia_services', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->bigInteger('bia_id')->unsigned();
            $table->foreign('bia_id')->references('id')->on('bias');
            $table->bigInteger('bia_department_id')->unsigned();
            $table->foreign('bia_department_id')->references('id')->on('bia_departments')->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->text('description')->nullable();

            $table->longText('financial')->nullable();
            $table->longText('impact')->nullable();
            $table->longText('criteria_weight')->nullable();
            $table->longText('impact_criteria_field')->nullable();


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
        Schema::dropIfExists('bia_services');
    }
}
