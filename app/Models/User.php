<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'tipo',  // 'tipo' debe existir en tu tabla 'users'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Verifica si el usuario es administrador
    public function isAdmin()
    {
        return $this->tipo === 'admin';
    }

    // Verifica si el usuario es vendedor
    public function isVendedor()
    {
        return $this->tipo === 'vendedor';
    }
}
