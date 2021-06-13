<?php

  

use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;

  

class CreateDiscountsTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create('discounts', function (Blueprint $table) {

            $table->increments('discount_id');
			$table->tinyInteger('discount_type')->default('1');
			$table->float('discount_value')->default('1');
            
        });

    }

  

    /**

     * Reverse the migrations.

     *

     * @return void

     */

    public function down()

    {

        Schema::dropIfExists('discounts');

    }

}