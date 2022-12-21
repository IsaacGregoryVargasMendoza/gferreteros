<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'identificadorCliente',
        'nombreCliente',
        'direccionCliente',
        'celularCliente',
        'correoCliente',
        'usuarioCliente',
        'contraseniaCliente',
        'estadoCliente'
    ];
}
