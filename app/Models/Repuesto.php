<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repuesto extends Model
{
    use HasFactory;
   
    protected $primaryKey = 'id_repuesto';  

    protected $fillable = [
        'nombre',
        'descripcion',
        'id_proveedor',
    ];

    public function proveedor()
    {
        return $this->belongsTo(Proveedore::class, 'id_proveedor');
    }

    public function mantenimientos()
    {
        return $this->belongsToMany(Mantenimiento::class, 'mantenimiento_repuesto', 'id_repuesto', 'mantenimiento_id');
    }
    
}
