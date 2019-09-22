<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger('product_id');
            $table->unsignedDecimal('purchase_rate', 10, 2);
            $table->unsignedDecimal('product_qty', 10, 2);
            $table->unsignedBigInteger('purchase_invoice_id');

            // $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('purchase_invoice_id')->references('id')->on('purchase_invoices');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_items');
    }
}
