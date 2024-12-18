<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Descuentos extends Model
{
    use HasFactory;
    protected $table='descuentos';
    protected $primaryKey='id_descuento';
    protected $fillable=[
        'nombre',
        'cantidad',
        'activo'
    ];
    public function producto()
    {
        return $this->belongsTo(Productos::class, 'id_producto');
    }
}
