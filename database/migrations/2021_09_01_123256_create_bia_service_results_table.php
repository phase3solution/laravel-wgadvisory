<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiaServiceResultsTable extends Migration
{
    
    public function up()
    {
        Schema::create('bia_service_results', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('company_id');
            $table->bigInteger('bia_id');
            $table->bigInteger('bia_service_id');

            $table->longText('key_purpose')->nullable();
            $table->longText('critical_dates')->nullable();
            $table->longText('activity')->nullable();
            $table->longText('responsibility')->nullable();
            $table->longText('estimate')->nullable();


            $table->longText('spe_day_1')->nullable();
            $table->longText('spe_day_3')->nullable();
            $table->longText('spe_week_1')->nullable();
            $table->longText('spe_week_2')->nullable();
            $table->longText('spe_week_4')->nullable();
            $table->longText('spe_weight')->nullable();
            $table->longText('spe_mto')->nullable();
            $table->longText('spe_critical_impact_comments')->nullable();
            $table->longText('spe_rpo')->nullable();
            $table->longText('spe_process_tomanually')->nullable();
            $table->longText('spe_upstream_dependencies')->nullable();
            $table->longText('spe_desktop_applications')->nullable();
            $table->longText('spe_comments')->nullable();
            $table->longText('spe_tier_1')->nullable();
            $table->longText('spe_tier_2')->nullable();
            $table->longText('spe_tier_3')->nullable();
            $table->longText('spe_tier_4')->nullable();
            $table->longText('spe_tier_5')->nullable();
            $table->longText('spe_cloud_providers')->nullable();
            $table->longText('spe_mobile_apps')->nullable();
            $table->longText('spe_external_functions')->nullable();
            $table->longText('spe_internal_upstream_dependency')->nullable();
            $table->longText('spe_internal_downstream_dependency')->nullable();
            $table->longText('spe_internal_comments')->nullable();

            $table->longText('rac_perform')->nullable();
            $table->longText('rac_cross_trained')->nullable();
            $table->longText('rac_comments')->nullable();



            $table->bigInteger('created_by');
            $table->bigInteger('updated_by')->nullable();


            $table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('bia_service_results');
    }
}
