<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSfiaRolesTable extends Migration
{
    
    public function up()
    {
        Schema::create('sfia_roles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('company_id')->nullable();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->boolean('status')->default(1)->nullable();
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by')->nullable();      
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('sfia_roles');
    }
}
