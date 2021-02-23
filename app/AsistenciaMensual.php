<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsistenciaMensual extends Model
{
    //
     //
    protected $table = 'asistencia_mensual'; // Nombre de la tabla
    protected $primaryKey = 'id'; // Clave primaria
    // Columnas de la tabla
    protected $fillable = ['cod_barras','mes','anio','d1','d2','d3','d4','d5','d6','d7','d8','d9','d10','d11','d12','d13','d14','d15','d16','d17','d18','d19','d20','d21','d22','d23','d24','d25','d26','d27','d28','d29','d30','d31' ];
}
