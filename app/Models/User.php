<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Votantes;

//Spatie
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    public function usuariosCreados() {
        return $this->hasMany(User::class, 'creador_id');
    }

    public function votantes()
    {
        return $this->hasMany(Votantes::class, 'puntero', 'id');
    }

    protected $fillable = [
        'name',
        'apellido',
        'cedula',
        'role',
        'creador_id',
        'direccion',
        'telefono',
        'email',
        'password',
        'departamento',
        'nombre_departamento',
        'distrito',
        'nombre_distrito',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
