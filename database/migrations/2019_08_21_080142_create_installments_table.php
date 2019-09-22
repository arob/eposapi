<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installments', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->tinyInteger('installment_number');
            $table->unsignedDecimal('installment_amount', 10, 2)->default(0);
            $table->unsignedBigInteger('sales_invoice_id');
            $table->date('due_date');

            $table->timestamps();

            $table->foreign('sales_invoice_id')->references('id')->on('sales_invoices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('installments');
    }
}
