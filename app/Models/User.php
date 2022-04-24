<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'username',
        'email',
        'password',
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
    ];

    /**
     * Evento que se ejecuta cuando un Usuario se ha creado
     */
    protected static function boot(){

        parent::boot();

        // Asignar perfil una vez se haya creado un usuario
        static::created(function($user){
            $user->perfil()->create();
        });
    }


    /**
     * Relación de 1:n de Usuarios a Recetas
     */
    public function recetas(){
        return $this->hasMany(Receta::class);
    }

    /**
     * Relación de 1:1 de Usuarios a Perfil
     */
    public function perfil(){
        return $this->hasOne(Perfil::class);
    }

    /**
     * Recetas que el usuario ha dado me gusta
     */
    public function meGusta(){
        return $this->belongsToMany(Receta::class, 'likes_receta', 'user_id');
    }
}
