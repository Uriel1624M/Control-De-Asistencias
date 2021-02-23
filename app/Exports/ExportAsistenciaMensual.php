<?php

namespace App\Exports;

use App\AsistenciaMensual;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;



class ExportAsistenciaMensual implements /*FromQuery,*/FromCollection,WithHeadings
{
	private $anio;
	private $mes;
	private $suscursal;
	/**
    * @return \Illuminate\Support\Collection
    */
    	public function __construct(int $anio,int $mes,int $sucursal){
    		$this->anio=$anio;
    		$this->mes=$mes;
    		$this->sucursal=$sucursal;

    	}



	/**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array {
    	return [
    		'CODIGO BARRAS',
    		'NOMBRE','DEPARTAMENTO','SUSCURSAL','DIA 01','DIA 02','DIA 03','DIA 04','DIA 05','DIA 06','DIA 07','DIA 08','DIA 09','DIA 10','DIA 11','DIA 12','DIA 13','DIA 14','DIA 15','DIA 16','DIA 17','DIA 18','DIA 19','DIA 20','DIA 21','DIA 22','DIA 23','DIA 24','DIA 25','DIA 26','DIA 27','DIA 28','DIA 29','DIA 30','DIA 31',
    	];
    }

   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(){
    	$result=\DB::table('personal')->
                select('personal.cod_barras','personal.nombre','departamento.departamento','sucursal.nombre as sucursal','asistencia_mensual.d1','asistencia_mensual.d2','asistencia_mensual.d3','asistencia_mensual.d4','asistencia_mensual.d5','asistencia_mensual.d6','asistencia_mensual.d7','asistencia_mensual.d8','asistencia_mensual.d9','asistencia_mensual.d10','asistencia_mensual.d11','asistencia_mensual.d12','asistencia_mensual.d13','asistencia_mensual.d14','asistencia_mensual.d15','asistencia_mensual.d16','asistencia_mensual.d17','asistencia_mensual.d18','asistencia_mensual.d19','asistencia_mensual.d20','asistencia_mensual.d21','asistencia_mensual.d22','asistencia_mensual.d23','asistencia_mensual.d24','asistencia_mensual.d25','asistencia_mensual.d26','asistencia_mensual.d27','asistencia_mensual.d28','asistencia_mensual.d29','asistencia_mensual.d30','asistencia_mensual.d31')
                ->join('departamento','departamento.id','=','personal.id_departamento')
                ->join('sucursal','sucursal.id','=','personal.id_sucursal')
                ->join('asistencia_mensual','asistencia_mensual.cod_barras','=','personal.cod_barras')
                ->where('asistencia_mensual.anio',$this->anio)
                ->where('asistencia_mensual.mes',$this->mes)
                ->where('personal.id_sucursal',$this->sucursal)->get();
        return $result;

    }

      
}
