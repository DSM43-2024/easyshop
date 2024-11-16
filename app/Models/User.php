<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Los atributos que son asignables masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'tipo',  
    ];

    /**
     * Los atributos que deberían ser ocultados para los arreglos.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Los atributos que deberían ser convertidos a tipos nativos.
     *
     * @var array<int, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Tipos de usuario
    public const TIPO_ADMINISTRADOR = 'administrador';
    public const TIPO_USUARIO = 'usuario';

    /**
     * Verificar si el usuario es administrador.
     *
     * @return bool
     */
    public function esAdministrador(): bool
    {
        return $this->tipo === self::TIPO_ADMINISTRADOR;
    }

    /**
     * Verificar si el usuario es un usuario normal.
     *
     * @return bool
     */
    public function esUsuario(): bool
    {
        return $this->tipo === self::TIPO_USUARIO;
    }
}
