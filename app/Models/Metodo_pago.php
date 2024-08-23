<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metodo_pago extends Model
{
    use HasFactory;
    protected $fillable = ['tipo'];

    public function mantenimientos()
    {
        return $this->hasMany(Mantenimiento::class, 'id_metodo_pago');
    }
}
