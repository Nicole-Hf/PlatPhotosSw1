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
        Schema::create('assitants', function (Blueprint $table) {
            $table->id();
            $table->string('codeqr')->nullable();
            $table->string('status')->default('pending');
            $table->unsignedBigInteger('eventoId');
            $table->unsignedBigInteger('guestId');
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('eventoId')->on('eventos')->references('id')->onDelete('cascade');
            $table->foreign('guestId')->on('guests')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assitants');
    }
};
