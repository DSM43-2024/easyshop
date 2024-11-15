<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedores_Productos extends Model
{
    use HasFactory;
    protected $table = 'proveedor_productos';
    protected $primaryKey = 'id_proveedor_producto';
    protected $fillable = [
        'id_proveedor',
        'id_producto'
    ];

    // Relación con Proveedores
    public function proveedor()
    {
        return $this->belongsTo(Proveedores::class, 'id_proveedor');
    }

    // Relación con Productos
    public function producto()
    {
        return $this->belongsTo(Productos::class, 'id_producto');
    }
}
