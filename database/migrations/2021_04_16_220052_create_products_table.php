<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateProductsTable.
 */
class CreateProductsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('maker_code')->nullable();
            $table->string('internal_code')->nullable();
            $table->integer('status')->default(1);
            $table->integer('active')->default(1);
            $table->string('brand')->nullable();
            $table->integer('unit')->nullable();
            $table->string('gtin')->nullable();
            $table->string('ncm')->nullable();
            $table->string('stock_location')->nullable();
            $table->double('stock_min')->nullable();
            $table->double('stock_max')->nullable();
            $table->double('quantity')->nullable();
            $table->integer('class_type_id')->nullable();
            $table->text('description')->nullable();
            $table->double('price')->nullable();
            $table->double('icms')->nullable();
            $table->double('ipi')->nullable();
            $table->double('pis')->nullable();
            $table->double('shipping_value')->nullable();
            $table->double('shipping_tax')->nullable();
            $table->double('commission_value')->nullable();
            $table->double('commission_tax')->nullable();
            $table->string('variation_1')->nullable();
            $table->string('variation_2')->nullable();
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
		Schema::drop('products');
	}
}
