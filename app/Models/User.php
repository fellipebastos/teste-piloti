<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    public static function boot() {
        parent::boot();
    
        // Antes de armazenar/atualizar o modelo
        static::saving(function (User $user) {
            // Verifica se existe uma nova senha
            if (Hash::needsRehash($user->password)) {
                // Criptografa senha
                $user->password = Hash::make($user->password);
            }
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'permission',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Checks if user is admin.
     * 
     * @return boolean
     */
    public function isAdmin() {
        return ($this->attributes['permission'] === 1);
    }
}
