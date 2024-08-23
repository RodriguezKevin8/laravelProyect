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
        Schema::table('mantenimientos', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('id_metodo_pago')->nullable()->after('proximo_mantenimiento');

            // Agregar la clave foránea
            $table->foreign('id_metodo_pago')
                ->references('id')
                ->on('metodo_pagos')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mantenimientos', function (Blueprint $table) {
            //
            $table->dropForeign(['id_metodo_pago']);

            // Eliminar el campo
            $table->dropColumn('id_metodo_pago');
        });
    }
};
