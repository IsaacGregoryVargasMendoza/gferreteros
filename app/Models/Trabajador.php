<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    use HasFactory;

    protected $fillable=[
        'identificadorTrabajador',
        'nombreTrabajador',
        'direccionTrabajador',
        'correoTrabajador',
        'celularTrabajador',
        'cargoTrabajador',
        'estadoTrabajador',
        'idTipoDocumento'
    ];
}
