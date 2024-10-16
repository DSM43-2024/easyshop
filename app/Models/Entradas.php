<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entradas extends Model
{
    use HasFactory;
    protected $table='entradas';
    protected $primaryKey='id_entrada';
    protected $fillable=[
        'id_producto',
        'id_proveedor'
    ];
}
