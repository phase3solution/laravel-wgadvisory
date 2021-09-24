<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSfiaCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sfia_categories', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies');

            $table->bigInteger('sfia_id')->unsigned();
            $table->foreign('sfia_id')->references('id')->on('sfias')->onDelete('cascade');

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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sfia_categories');
    }
}
