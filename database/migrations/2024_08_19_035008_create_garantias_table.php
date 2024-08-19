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
        Schema::create('garantias', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table ->unsignedBigInteger('id_auto');
            $table ->unsignedBigInteger('id_tipo_garantia');
            $table->timestamps();
            $table ->foreign('id_auto') ->references('id')-> on('autos');
            $table ->foreign('id_tipo_garantia') -> references('id')-> on('tipo_garantias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('garantias');
    }
};
