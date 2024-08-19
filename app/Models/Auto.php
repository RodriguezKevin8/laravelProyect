<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    use HasFactory;
    protected $fillable = ['detalles', 'numero_serie', 'estado', 'id_cliente', 'id_modelo'];
}
