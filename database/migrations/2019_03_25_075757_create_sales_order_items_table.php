<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_order_items', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('product_id');
            $table->unsignedDecimal('product_qty', 10, 2);
            $table->unsignedDecimal('order_rate', 10, 2);
            $table->unsignedDecimal('vat_amount', 10, 2);
            $table->unsignedDecimal('tax_amount', 10, 2);
            $table->unsignedDecimal('discount_amount', 10, 2);
            $table->unsignedBigInteger('sales_order_id');

            $table->string('notes', 255);
            $table->timestamps();

            $table->foreign('sales_order_id')->references('id')->on('sales_orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_order_items');
    }
}
