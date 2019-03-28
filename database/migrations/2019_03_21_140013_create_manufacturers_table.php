<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManufacturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manufacturers', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('name', 50)->unique();
            $table->string('short_name', 10)->unique()->nullable();
            $table->string('website', 100)->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->boolean('status')->default(true);
            $table->unsignedBigInteger('user_id');

            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manufacturers');
    }
}
