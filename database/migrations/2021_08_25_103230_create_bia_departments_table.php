<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiaDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bia_departments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->bigInteger('bia_id')->unsigned();
            $table->foreign('bia_id')->references('id')->on('bias')->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->boolean('status')->default(1)->nullable();
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by')->nullable();

            $table->integer('gq_row_sp')->nullable();
            $table->integer('gq_row_bl')->nullable();
            $table->integer('se_row_vital_record')->nullable();
            $table->integer('se_row_technology_required')->nullable();
            $table->integer('se_row_notification_n_communication')->nullable();
            $table->integer('se_row_department_contact_list')->nullable();
            $table->integer('se_row_external_contact_list')->nullable();
            $table->integer('se_row_other_internal_dependency')->nullable();
            $table->integer('cp_row_essential_personnel')->nullable();
            $table->integer('tap_row_team_action_plan')->nullable();


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
        Schema::dropIfExists('bia_departments');
    }
}
