<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
        
    protected $table = 'asistencia'; // Nombre de la tabla
    protected $primaryKey = 'id'; // Clave primaria
    // Columnas de la tabla
    protected $fillable = ['cod_barras','fecha','hora_entrada',
    'hora_salida','hora_entrada2','hora_salida2' ];

}
