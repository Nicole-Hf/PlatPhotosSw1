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
        Schema::create('fotos', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->float('price');
            $table->unsignedBigInteger('catalogo_id');
            $table->unsignedBigInteger('fotografo_id');
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('catalogo_id')->on('catalogos')->references('id')->onDelete('cascade');
            $table->foreign('fotografo_id')->on('users')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fotos');
    }
};
