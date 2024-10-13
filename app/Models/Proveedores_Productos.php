<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedores_Productos extends Model
{
    use HasFactory;
    protected $table='proveedor_producto';
    protected $primaryKey='id_proeedor_producto';
    protected $fillable=[
        'id_proveedor',
        'id_producto'
    ];
}
