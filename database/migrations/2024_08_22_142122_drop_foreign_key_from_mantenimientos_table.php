<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('mantenimientos', function (Blueprint $table) {
            $table->dropForeign(['id_usuario']); 
            $table->dropColumn('id_usuario');    
        });
    }
    
    public function down()
    {
        Schema::table('mantenimientos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }
};
