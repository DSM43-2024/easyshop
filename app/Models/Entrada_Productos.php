<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada_Productos extends Model
{
    use HasFactory;
    protected $table='entrada_productos';
    protected $primaryKey='id_entrada_producto';
    protected $fillable=[
        'id_entrada',
        'id_producto',
        'fecha'
    ];
    public function entrada()
    {
        return $this->belongsTo(Entradas::class,'id_entrada');
    }
    public function productos(){
        return $this->belongsTo(Productos::class,'id_producto');
    }
}
