<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date')->nullable();
            $table->integer('invoice_id');
            $table->integer('category_id');
            $table->integer('product_id');
            $table->double('selling_qty');
            $table->double('unit_price');
            $table->double('selling_price');
            $table->tinyInteger('status')->default(1);
            $table->integer('created_by')->nullable();
            $table->string('created_by_name')->nullable();
            $table->integer('approved_by')->nullable();
            $table->string('approved_by_name')->nullable();
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
        Schema::dropIfExists('invoice_details');
    }
}
