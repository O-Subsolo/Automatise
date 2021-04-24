<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFloatFieldsProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table){
            $table->decimal('stock_min', $precision = 8, $scale = 2)->change();
            $table->decimal('stock_max', $precision = 8, $scale = 2)->change();
            $table->decimal('quantity', $precision = 8, $scale = 2)->change();
            $table->decimal('price', $precision = 8, $scale = 2)->change();
            $table->decimal('icms', $precision = 8, $scale = 2)->change();
            $table->decimal('ipi', $precision = 8, $scale = 2)->change();
            $table->decimal('pis', $precision = 8, $scale = 2)->change();
            $table->decimal('shipping_value', $precision = 8, $scale = 2)->change();
            $table->decimal('shipping_tax', $precision = 8, $scale = 2)->change();
            $table->decimal('commission_value', $precision = 8, $scale = 2)->change();
            $table->decimal('commission_tax', $precision = 8, $scale = 2)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table){
            /*$table->double('stock_min')->change();
            $table->double('stock_max')->change();
            $table->double('price')->change();
            $table->double('shipping_value')->change();
            $table->double('commission_value')->change();*/
        });
    }
}
