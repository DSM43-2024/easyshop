<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    use HasFactory;
    protected $table='ventas';
    protected $primaryKey='id_venta';
    protected $fillable=[
        'id_personal',
        'nombre'
    ];
    public function personal(){
        return $this->belongsTo(Personal::class,'id_personal');
    }
}
