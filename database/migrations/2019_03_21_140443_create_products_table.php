<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('code', 20)->unique();
            $table->string('name', 50);
            $table->string('model', 20)->unique();
            $table->unsignedDecimal('size', 10, 2)->nullable();
            $table->unsignedBigInteger('size_unit_id')->nullable();
            $table->unsignedBigInteger('uom_id')->nullable();
            $table->text('description')->nullable();
            $table->unsignedDecimal('sales_rate', 10, 2);         
            $table->unsignedDecimal('vat_pct', 5, 2)->default(0);        
            $table->unsignedDecimal('tax_pct', 5, 2)->default(0);            
            $table->unsignedDecimal('discount_pct', 5, 2)->default(0);
            $table->unsignedDecimal('stock_qty', 10, 2)->default(0);
            $table->unsignedDecimal('reorder_level', 10, 2)->default(10);
            $table->unsignedSmallInteger('warranty_period')->default(0);
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->unsignedBigInteger('manufacturer_id')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->boolean('status')->default(true);
            $table->unsignedBigInteger('user_id');

            $table->foreign('uom_id')->references('id')->on('uoms');
            $table->foreign('size_unit_id')->references('id')->on('size_units');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('products');
    }
}
