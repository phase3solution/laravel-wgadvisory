<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSfiaRoleUsersTable extends Migration
{
    
    public function up()
    {
        Schema::create('sfia_role_users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('company_id')->nullable();
            $table->bigInteger('sfia_role_id')->nullable();
            $table->bigInteger('sfia_user_id')->nullable();
            $table->text('description')->nullable();
            $table->boolean('status')->default(1)->nullable();
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by')->nullable();  
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('sfia_role_users');
    }
}
