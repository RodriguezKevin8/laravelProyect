<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $fillable = ['fecha_venta', 'precio', 'id_metodo_pago', 'id_auto', 'id_cliente', 'id_usuario'];
}
