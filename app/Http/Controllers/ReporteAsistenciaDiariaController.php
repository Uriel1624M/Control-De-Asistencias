<?php

namespace App\Http\Controllers;
use App\Departamento;

use App\Sucursal;
//Importacion de la liberia DB
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;



class ReporteAsistenciaDiariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \App\Middelware\Response
     */

    public function __construct()
    {
        $this->middleware('user_rool');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $departamento= Departamento::all()->sortBy('id', SORT_NATURAL | SORT_FLAG_CASE)->pluck('departamento', 'id');
        $sucursal= Sucursal::all()->sortBy('id', SORT_NATURAL | SORT_FLAG_CASE)->pluck('nombre', 'id');
        
        
        return view('reportes_asistencia.reporte_asistencia_diaria',compact('departamento','sucursal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   //recuperamos la fecha
        $fecha=$request->get('fecha');
        //recuperamos la sucursal
        $sucursal=$request->get('id_sucursal');
        //recuperamos el departamento
        $departamento=$request->get('id_departamento');
        $result="";

        if ($sucursal !=null && $departamento != null) {
                # code...
                 $result=\DB::table('personal')->
                select('personal.cod_barras','personal.nombre','asistencia.fecha','asistencia.hora_entrada','asistencia.hora_salida','asistencia.hora_entrada2','asistencia.hora_salida2','departamento.departamento','sucursal.nombre as sucursal'
                    ,DB::raw('DATEDIFF(MINUTE,"asistencia"."hora_entrada","asistencia"."hora_salida") AS TURNO1')
                    ,DB::raw('DATEDIFF(MINUTE,"asistencia"."hora_entrada2","asistencia"."hora_salida2") AS TURNO2'))
                ->join('asistencia','asistencia.cod_barras','=','personal.cod_barras')
                ->join('departamento','departamento.id','=','personal.id_departamento')
                ->join('sucursal','sucursal.id','=','personal.id_sucursal')
                ->where('personal.id_sucursal',$sucursal)
                ->where('personal.id_departamento',$departamento)
                ->where('asistencia.fecha',$fecha)->get();
                //return response()->json([$result]);
                
            }else{
                if ($sucursal=="" && $departamento=="") {
                    //consulta
                    $result=\DB::table('personal')->
                    select('personal.cod_barras','personal.nombre','asistencia.fecha','asistencia.hora_entrada','asistencia.hora_salida','asistencia.hora_entrada2','asistencia.hora_salida2','departamento.departamento','sucursal.nombre as sucursal'
                        ,DB::raw('DATEDIFF(MINUTE,"asistencia"."hora_entrada","asistencia"."hora_salida") AS TURNO1')
                        ,DB::raw('DATEDIFF(MINUTE,"asistencia"."hora_entrada2","asistencia"."hora_salida2") AS TURNO2'))
                    ->join('asistencia','asistencia.cod_barras','=','personal.cod_barras')
                    ->join('departamento','departamento.id','=','personal.id_departamento')
                    ->join('sucursal','sucursal.id','=','personal.id_sucursal')
                    ->where('asistencia.fecha',$fecha)->get();
                     //return response()->json([$result]);
                    
            }else{
                if ($sucursal=="") {
                         $result=\DB::table('personal')->
                         select('personal.cod_barras','personal.nombre','asistencia.fecha','asistencia.hora_entrada','asistencia.hora_salida','asistencia.hora_entrada2','asistencia.hora_salida2','departamento.departamento','sucursal.nombre as sucursal'
                            ,DB::raw('DATEDIFF(MINUTE,"asistencia"."hora_entrada","asistencia"."hora_salida") AS TURNO1')
                            ,DB::raw('DATEDIFF(MINUTE,"asistencia"."hora_entrada2","asistencia"."hora_salida2") AS TURNO2'))
                        ->join('asistencia','asistencia.cod_barras','=','personal.cod_barras')
                        ->join('departamento','departamento.id','=','personal.id_departamento')
                        ->join('sucursal','sucursal.id','=','personal.id_sucursal')
                        ->where('personal.id_departamento',$departamento)
                        ->where('asistencia.fecha',$fecha)->get();

               // return response()->json([$result]);

                }else {
                    if ($departamento=="") {
                        $result=\DB::table('personal')->
                        select('personal.cod_barras','personal.nombre','asistencia.fecha','asistencia.hora_entrada','asistencia.hora_salida','asistencia.hora_entrada2','asistencia.hora_salida2','departamento.departamento','sucursal.nombre as sucursal'
                            ,DB::raw('DATEDIFF(MINUTE,"asistencia"."hora_entrada","asistencia"."hora_salida") AS TURNO1')
                            ,DB::raw('DATEDIFF(MINUTE,"asistencia"."hora_entrada2","asistencia"."hora_salida2") AS TURNO2'))
                        ->join('asistencia','asistencia.cod_barras','=','personal.cod_barras')
                        ->join('departamento','departamento.id','=','personal.id_departamento')
                        ->join('sucursal','sucursal.id','=','personal.id_sucursal')
                        ->where('personal.id_sucursal',$sucursal)
                        ->where('asistencia.fecha',$fecha)->get();
                       // return response()->json([$result]);
                    }
                       
                }
            }  
        }
        //retornamos los resultados en pdf
        $pdf=app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php",true);
        $pdf->loadView('Reportes.reporte_diario',compact('result','fecha'));
        $pdf->setPaper('A4','portrait');
        return $pdf->stream('AsistenciaDiaria.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

}
