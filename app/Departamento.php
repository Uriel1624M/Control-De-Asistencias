<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    //
    protected $table = 'departamento'; // Nombre de la tabla
    protected $primaryKey = 'id'; // Clave primaria

    // Columnas de la tabla
    protected $fillable = [ 'id','departamento' ];

    //funcion para filtrado
    public function scopeBuscar($query, $departamento)
    {
        if ($departamento != "") {
            $query->where('departamento', "LIKE", "%$departamento%");
        }
    }
}
