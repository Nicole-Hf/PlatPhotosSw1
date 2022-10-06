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
        Schema::create('invitaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('evento_id')->nullable();
            $table->unsignedBigInteger('fotografo_id')->nullable();
            $table->string('estado')->default('Pendiente');
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('evento_id')->on('eventos')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('invitaciones');
    }
};
