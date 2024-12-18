<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta_Productos extends Model
{
    use HasFactory;

    protected $table = 'venta_productos';
    protected $primaryKey = 'id_venta_producto';
    protected $fillable = [
        'id_venta',
        'id_producto',
        'fecha',
    ];

    public function venta()
    {
        return $this->belongsTo(Ventas::class, 'id_venta');
    }

    public function producto()
    {
        return $this->belongsTo(Productos::class, 'id_producto');
    }
    
}
