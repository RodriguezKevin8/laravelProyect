<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Mantenimiento extends Model
{
    use HasFactory;
    protected $fillable = ['fecha_mantenimiento', 'descripcion', 'id_auto', 'total', 'proximo_mantenimiento', 'id_usuario', 'mano_de_obra','id_metodo_pago'];

    public function repuestos()
    {
        return $this->belongsToMany(Repuesto::class, 'mantenimiento_repuesto', 'mantenimiento_id', 'id_repuesto');
    }
    public function metodoPago()
    {
        return $this->belongsTo(MetodoPago::class, 'id_metodo_pago');
    }
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
