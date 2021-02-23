<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'email','id_rol' ,'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /**
     *
     *
     * @Funcion de Busquda
     */

    public function scopeBuscar($query, $nombre)
    {
        if ($nombre != "") {
            $query->where('name', "LIKE", "%$nombre%");
        }
    }

    public function perfil(){
        //El empleado solo puede desempeñarse en un cargo
        return $this->hasOne('App\Roles','id','id_rol');
      }
}
