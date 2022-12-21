<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $fillable=[
        'serieCompra',
        'fechaCompra',
        'subtotalCompra',
        'igvCompra',
        'totalCompra',
        'estadoCompra',
        'idProveedor',
        'idTrabajador'
    ];
}
