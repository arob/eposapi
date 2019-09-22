<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('name', 50)->unique();
            $table->string('contact_person', 50);
            $table->string('contact_number', 50);
            $table->string('email', 100)->nullable();
            $table->string('address', 255)->nullable();
            $table->unsignedBigInteger('thana_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->decimal('payable', 10, 2)->default(0);
            $table->string('website', 255)->nullable();
            $table->boolean('status')->default(true);
            $table->unsignedBigInteger('user_id');

            $table->timestamps();

            $table->foreign('thana_id')->references('id')->on('thanas');
            $table->foreign('district_id')->references('id')->on('districts');
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
        Schema::dropIfExists('suppliers');
    }
}
