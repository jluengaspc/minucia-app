<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('piezas', function (Blueprint $table) {
                        $table->id();
                        $table->string('nombre');
                        $table->float('peso_teorico');
                        $table->float('peso_real')->nullable();
                        $table->enum('estado', ['Pendiente', 'Fabricado']);
                        $table->unsignedBigInteger('bloque_id');
                        $table->date('fecha_registro')->nullable();
                        $table->unsignedBigInteger('user_id')->nullable();
                        $table->timestamps();


            $table->foreign('bloque_id')->references('id')->on('bloques');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('piezas');
    }
};
