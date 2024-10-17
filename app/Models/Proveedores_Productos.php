<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedores_Productos extends Model
{
    use HasFactory;
    protected $table='proveedor_producto';
    protected $primaryKey='id_proveedor_producto';
    protected $fillable=[
        'id_proveedor',
        'id_producto'
    ];
    public function proveedores(){
        return $this->belongsTo(Proveedores::class,'id_proveedor');
    }
    public function productos(){
        return $this->belongsTo(Productos::class,'id_producto');
    }
}
