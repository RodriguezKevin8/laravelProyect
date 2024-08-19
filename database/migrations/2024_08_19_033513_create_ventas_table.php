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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_venta');
            $table->decimal('precio', 10, 2);
            $table ->unsignedBigInteger('id_metodo_pago');
            $table ->unsignedBigInteger('id_auto');
            $table ->unsignedBigInteger('id_cliente');
            $table ->unsignedBigInteger('id_usuario');
            $table->timestamps();
            $table ->foreign('id_metodo_pago') ->references('id')-> on('metodo_pagos');
            $table ->foreign('id_auto') ->references('id')-> on('autos');
            $table ->foreign('id_cliente') ->references('id')-> on('clientes');
            $table ->foreign('id_usuario') ->references('id')-> on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
