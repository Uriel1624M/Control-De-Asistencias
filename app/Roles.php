<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    //
    protected $table = 'roles'; // Nombre de la tabla
    protected $primaryKey = 'id'; // Clave primaria

    // Columnas de la tabla
    protected $fillable = ['nombre'];
     //funcion para filtrado
    public function scopeBuscar($query, $nombre)
    {
        if ($nombre != "") {
            $query->where('nombre', "LIKE", "%$nombre%");
        }
    }
    
}
