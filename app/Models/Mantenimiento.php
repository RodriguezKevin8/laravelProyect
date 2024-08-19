<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    use HasFactory;
    protected $fillable = ['fecha_mantenimiento', 'descripcion', 'id_auto', 'total', 'proximo_mantenimiento', 'id_usuario'];
}
