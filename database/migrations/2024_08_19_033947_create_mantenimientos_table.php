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
        Schema::create('mantenimientos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_mantenimiento');
            $table->text('descripcion')->nullable();
            $table ->unsignedBigInteger('id_auto');
            $table->decimal('total', 10, 2)->nullable();
            $table->date('proximo_mantenimiento')->nullable();
            $table ->unsignedBigInteger('id_usuario');
            $table->timestamps();
            $table ->foreign('id_auto') ->references('id')-> on('autos');
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mantenimientos');
    }
};
