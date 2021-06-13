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

        Schema::create('products', function (Blueprint $table) {

            $table->increments('product_id');
			$table->string('product_name');
            $table->float('quantity');
			$table->float('unit_price');
			$table->float('tax_perc')->default('0');
			$table->float('tax_amount')->default('0');
			$table->float('discount')->default('0');
			$table->float('total')->default('0');

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