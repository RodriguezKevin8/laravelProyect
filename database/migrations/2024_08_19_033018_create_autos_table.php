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
        Schema::create('autos', function (Blueprint $table) {
            $table->id();
            $table->text('detalles')->nullable();
            $table->string('numero_serie')->nullable();
            $table->string('estado')->nullable();
            $table ->unsignedBigInteger('id_cliente');
            $table ->unsignedBigInteger('id_modelo');
            $table->timestamps();
            $table ->foreign('id_cliente') ->references('id')-> on('clientes');
            $table ->foreign('id_modelo') ->references('id')-> on('modelos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autos');
    }
};
