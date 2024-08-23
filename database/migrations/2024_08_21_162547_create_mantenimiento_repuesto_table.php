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
        Schema::create('mantenimiento_repuesto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mantenimiento_id');
            $table->unsignedBigInteger('id_repuesto');
            $table->timestamps();

            // Claves foráneas
            $table->foreign('mantenimiento_id')->references('id')->on('mantenimientos')->onDelete('cascade');
            $table->foreign('id_repuesto')->references('id_repuesto')->on('repuestos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mantenimiento_repuesto');
    }
};
