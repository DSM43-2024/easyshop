<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    use HasFactory;
    protected $table='ubicacion';
    protected $primaryKey='id_ubicacion';
    protected $fillable=[
        'estante',
        'pasillo'
    ];
    public function producto()
    {
        return $this->belongsTo(Productos::class, 'id_producto');
    }
    
}
