<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'codigoProducto',
        'nombreProducto',
        'descripcionProducto',
        'imagenProducto',
        'visibleProducto',
        'estadoProducto',
        'idCategoria'
    ];

    public function categoria(){
        return $this->belongsTo(Categoria::class,'idCategoria');
    }
}
