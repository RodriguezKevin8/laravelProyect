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
        Schema::table('autos', function (Blueprint $table) {
             // Eliminar la columna id_cliente
             $table->dropForeign(['id_cliente']);
             $table->dropColumn('id_cliente');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('autos', function (Blueprint $table) {
              // Volver a agregar la columna id_cliente
              $table->unsignedBigInteger('id_cliente')->nullable();
              $table->foreign('id_cliente')->references('id')->on('clientes');
        });
    }
};
