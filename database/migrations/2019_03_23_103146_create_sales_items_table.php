<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesItemsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('sales_items', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('product_id');
            $table->unsignedDecimal('product_qty', 10, 2);
            $table->unsignedDecimal('sales_rate', 10, 2);
            $table->unsignedDecimal('vat_amount', 10, 2);
            $table->unsignedDecimal('tax_amount', 10, 2);
            $table->unsignedDecimal('discount_amount', 10, 2);
            $table->unsignedBigInteger('sales_invoice_id');
        
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('sales_invoice_id')->references('id')->on('sales_invoices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('sales_items');
    }
}
