<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    //
    protected $table = 'cargo'; // Nombre de la tabla
    protected $primaryKey = 'id'; // Clave primaria

    // Columnas de la tabla
    protected $fillable = [ 'id','cargo' ];

     //funcion para filtrado
    public function scopeBuscar($query, $cargo)
    {
        if ($cargo != "") {
            $query->where('cargo', "LIKE", "%$cargo%");
        }
    }

}
