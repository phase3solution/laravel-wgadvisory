<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiaDepartmentResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bia_department_results', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('company_id');
            $table->bigInteger('bia_id');
            $table->bigInteger('bia_department_id');

            $table->string('staff')->nullable();
            $table->string('contact')->nullable();
            $table->string('date')->nullable();

            $table->longText('high_level_description')->nullable();
            $table->longText('explan_any_issue')->nullable();

            $table->longText('spe_vital_records_files')->nullable();
            $table->longText('spe_vital_records_description')->nullable();
            $table->longText('spe_vital_records_location')->nullable();
            $table->longText('spe_vital_records_format')->nullable();
            $table->longText('spe_vital_records_updated')->nullable();
            $table->longText('spe_technology_computers')->nullable();
            $table->longText('spe_technology_normal')->nullable();
            $table->longText('spe_technology_msl')->nullable();
            $table->longText('spe_technology_desktop_applications')->nullable();
            $table->longText('spe_technology_function')->nullable();
            $table->longText('spe_technology_support_contact')->nullable();
            $table->longText('spe_technology_comments')->nullable();

            $table->longText('rac_notification_system')->nullable();
            $table->longText('rac_notification_how_to_use')->nullable();
            $table->longText('rac_notification_support_items')->nullable();
            $table->longText('rac_notification_acces_list')->nullable();
            $table->longText('rac_internal_position')->nullable();
            $table->longText('rac_internal_name')->nullable();
            $table->longText('rac_internal_office_phone')->nullable();
            $table->longText('rac_internal_cell_phone')->nullable();
            $table->longText('rac_internal_email')->nullable();
            $table->longText('rac_external_vendor')->nullable();
            $table->longText('rac_external_contact')->nullable();
            $table->longText('rac_external_phone')->nullable();
            $table->longText('rac_external_email')->nullable();
            $table->longText('rac_external_comments')->nullable();

            $table->longText('tap_service')->nullable();
            $table->longText('tap_prime')->nullable();
            $table->longText('tap_prime_phone')->nullable();
            $table->longText('tap_primve_email')->nullable();
            $table->longText('tap_secondary')->nullable();
            $table->longText('tap_secondary_phone')->nullable();
            $table->longText('tap_secondary_email')->nullable();
            $table->longText('tap_service_impact')->nullable();
            $table->longText('tap_day_1')->nullable();
            $table->longText('tap_day_2')->nullable();




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
        Schema::dropIfExists('bia_department_results');
    }
}
