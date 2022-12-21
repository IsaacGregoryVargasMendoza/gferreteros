<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
    use HasFactory;

    protected $fillable=[
        'cantidadMinimaPrecio',
        'montoPrecio',
        'idPresentacion'
    ];

    public function presentacion(){
        return $this->belongsTo(Precio::class,'idPrecio');
    }
}
