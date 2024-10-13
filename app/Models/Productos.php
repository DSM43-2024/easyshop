<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;
    protected $table='productos';
    protected $primaryKey='id_producto';
    protected $fillable=[
        'id_categoria',
        'stock',
        'precio',
        'id_descuento',
        'id_ubicacion',
        'activo',
        'caducidad'
    ];
}
