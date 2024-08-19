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
        Schema::create('comprobantes', function (Blueprint $table) {
            $table->id();
            $table->decimal('total', 10, 2);
            $table->date('fecha_emision');
            $table->text('descripcion')->nullable();
            $table ->unsignedBigInteger('id_venta');
            $table->unsignedBigInteger('id_mantenimiento');
            $table->timestamps();
            $table ->foreign('id_venta') ->references('id')-> on('ventas');
            $table ->foreign('id_mantenimiento') ->references('id')-> on('mantenimientos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comprobantes');
    }
};
