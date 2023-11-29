<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacciones', function (Blueprint $table) {
            $table->id();
            $table->string('shippingMethod');
            $table->string('phone');
            $table->string('paymentMethod');
            $table->float('amount');
            $table->date('paymentDate');
            $table->unsignedBigInteger('compra_id');
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('compra_id')->on('compras')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transacciones');
    }
};
