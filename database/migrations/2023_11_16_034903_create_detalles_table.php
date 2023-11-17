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
        Schema::create('detalles', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('quantity');
            $table->float('subtotal');
            $table->unsignedBigInteger('foto_id');
            $table->unsignedBigInteger('compra_id');
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('foto_id')->on('fotos')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('detalles');
    }
};
