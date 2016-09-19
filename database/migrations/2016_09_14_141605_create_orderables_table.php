<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('orderables', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('order_id');
            $table->integer('orderable_id');
            $table->string('orderable_type');
            $table->index('order_id');
            $table->index('orderable_id');
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
        
       Schema::drop('orderables');
    }
}
