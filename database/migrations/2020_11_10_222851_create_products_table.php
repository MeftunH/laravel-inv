<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->id('id');
                $table->bigInteger('customer_id')->unsigned();
                $table->string('product_name');
                $table->float('product_number');
                $table->string('details')->nullable();
                $table->float('one_price');
                $table->float('total_price');
                $table->string('order_time');
                $table->string('dead_line')->nullable();
                $table->boolean('status');
                $table->timestamps();
            });
        }
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
