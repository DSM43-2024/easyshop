<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    use HasFactory;
    protected $table='proveedores';
    protected $primaryKey='id_proveedor';
    protected $fillable=[
        'nombre',
        'email',
        'activo'
    ];
    public function productos()
    {
        return $this->hasMany(Proveedores_Productos::class, 'id_proveedor');
    }
    public function entrada(){
        return $this->belongsTo(Entradas::class,'id_entrada');
    }
}
