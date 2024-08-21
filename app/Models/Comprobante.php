<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comprobante extends Model
{
    use HasFactory;
    protected $fillable = ['total', 'fecha_emision', 'descripcion', 'id_venta', 'id_mantenimiento'];

    public function venta()
    {
        return $this->belongsTo(Venta::class, 'id_venta');
    }

    public function mantenimiento()
    {
        return $this->belongsTo(Mantenimiento::class, 'id_mantenimiento');
    }

}
