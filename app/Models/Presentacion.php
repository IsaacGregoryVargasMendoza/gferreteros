<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presentacion extends Model
{
    use HasFactory;

    protected $fillable=[
        'descripcionPresentacion',
        'stockPresentacion',
        'idUnidadMedida',
        'idProducto'
    ];

    public function precios(){
        return $this->hasMany(Precio::class,'idPrecio');
    }
}
