<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccVoucherDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acc_voucher_details', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('head_id');
            $table->unsignedDecimal('dr_amount');
            $table->unsignedDecimal('cr_amount');

            $table->timestamps();

            $table->foreign('head_id')->references('id')->on('acc_heads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acc_voucher_details');
    }
}
