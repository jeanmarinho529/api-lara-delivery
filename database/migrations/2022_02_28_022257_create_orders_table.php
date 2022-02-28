<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('external_number');
            $table->string('client_name', 150);
            $table->string('client_phone', 11)->nullable();
            $table->string('client_lat', 100);
            $table->string('client_long', 100);
            $table->string('origin_lat', 100);
            $table->string('origin_long', 100);
            $table->string('note')->nullable();
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->unsignedBigInteger('order_status_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('store_id', 'fk_orders_store_id')
                ->references('id')
                ->on('stores');

            $table->foreign('driver_id', 'fk_orders_driver_id')
                ->references('id')
                ->on('drivers');

            $table->foreign('order_status_id', 'fk_orders_order_status_id')
                ->references('id')
                ->on('order_status');

            $table->unique(['external_number', 'store_id'],'uqn_orders_external_number_store_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
