<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;
    protected $table='categorias';
    protected $primaryKey='id_categoria';
    protected $fillable=[
        'nombre',
        'tipo'
    ];
    public function producto()
    {
        return $this->belongsTo(Productos::class, 'id_producto');
    }

}
