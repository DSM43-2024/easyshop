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
        'caducidad',
        'nombre'
    ];
    public function proveedores()
    {
        return $this->hasMany(Proveedores_Productos::class, 'id_producto');
    }
    public function venta(){
        return $this->belongsTo(Ventas::class,'id_venta');
    }
    public function entrada(){
        return $this->belongsTo(Entradas::class,'id_entrada');
    }
   
}
