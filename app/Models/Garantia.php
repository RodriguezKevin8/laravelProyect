<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Garantia extends Model
{
    use HasFactory;
    protected $fillable = ['fecha_inicio', 'fecha_fin', 'id_auto', 'id_tipo_garantia'];
}
