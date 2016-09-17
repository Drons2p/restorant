<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('dish_order', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('dish_id');
            $table->integer('order_id');
            $table->integer('user_id');
            $table->string('user_name');
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
        
        Schema::drop('dish_order');
    }
}
