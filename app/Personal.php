<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    //
     protected $table = 'personal'; // Nombre de la tabla
     protected $primaryKey = 'id'; // Clave primaria

    // Columnas de la tabla
    protected $fillable = ['cod_barras','nombre','url_foto','fecha_nacimiento','telefono','id_direccion','id_cargo','id_departamento','id_sucursal'];

    public function direccion(){
        //El empleado solo puede tener una direccion
        return $this->hasOne('App\Direccion','id','id_direccion');
      }

      public function cargos(){
        //El empleado solo puede desempeñarse en un cargo
        return $this->hasOne('App\Cargo','id','id_cargo');
      }
      public function departamentos(){
        //El empleado solo puede pertenecer a un departamento
        return $this->hasOne('App\Departamento','id','id_departamento');
      }
      public function sucursal(){
        //El empleado solo debe pertenecer a una sucucursal
        return $this->hasOne('App\Sucursal','id','id_sucursal');
      }

      //funcion para filtrado
      public function scopeBuscar($query, $persona)
      {
          if ($persona != "") {
              $query->where('nombre', "LIKE", "%$persona%")
              ->orwhere('cod_barras',"LIKE","%$persona%");
          }
      }
}
