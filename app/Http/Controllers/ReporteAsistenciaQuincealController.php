<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sucursal;
//Importacion de la liberia DB
use Illuminate\Support\Facades\DB;

class ReporteAsistenciaQuincealController extends Controller
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
         $sucursal= Sucursal::all()->sortBy('id', SORT_NATURAL | SORT_FLAG_CASE)->pluck('nombre', 'id');
        
        
        return view('reportes_asistencia.reporte_asistencia_quincenal',compact('sucursal'));
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
    {
        
        //Validamos los datos
        $this->validate($request,
         ['fecha_inicio' => 'required',
            'fecha_final'=>'required',
            'id_sucursal'=>'required',
        ]);
           
        $fecha_inicio=$request->get('fecha_inicio');
        $fecha_final=$request->get('fecha_final');
        
        //recuperamos la sucursal
        $sucursal=$request->get('id_sucursal');

        $result=\DB::table('personal')->
                select('personal.cod_barras','asistencia.fecha','personal.nombre','asistencia.fecha','asistencia.hora_entrada','asistencia.hora_salida','asistencia.hora_entrada2','asistencia.hora_salida2','departamento.departamento','sucursal.nombre as sucursal'
                    ,DB::raw('DATEDIFF(MINUTE,"asistencia"."hora_entrada","asistencia"."hora_salida") AS TURNO1')
                    ,DB::raw('DATEDIFF(MINUTE,"asistencia"."hora_entrada2","asistencia"."hora_salida2") AS TURNO2'))
                ->join('asistencia','asistencia.cod_barras','=','personal.cod_barras')
                ->join('departamento','departamento.id','=','personal.id_departamento')
                ->join('sucursal','sucursal.id','=','personal.id_sucursal')
                ->where('personal.id_sucursal',$sucursal)
                ->where('asistencia.fecha','>=',$fecha_inicio)
                ->where('asistencia.fecha','<=',$fecha_final)
                ->orderBy('asistencia.cod_barras','desc')
                ->orderBy('asistencia.fecha','asc')
                ->get();


                //retornamos los resultados en pdf
        $pdf=app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php",true);
        $pdf->loadView('Reportes.reporte_quincenal',compact('result','fecha_inicio','fecha_final'));
        $pdf->setPaper('A4','portrait');
        return $pdf->stream('AsistenciaDiaria.pdf');
                //return response()->json([$result]);

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
