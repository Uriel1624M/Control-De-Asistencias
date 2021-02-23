<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sucursal;
//Importacion de la liberia DB
use Illuminate\Support\Facades\DB;
use App\Exports\ExportAsistenciaMensual;
use Maatwebsite\Excel\Facades\Excel;
//usado para obtener fecha actual
use Carbon\Carbon;



class ReporteAsistenciaMensualController extends Controller
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
        $fecha=Carbon::now();
        $anio=$fecha->format('Y');
          
        
        
        return view('reportes_asistencia.reporte_asistencia_mensual',compact('sucursal','anio'));

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
        //validamos los datos
        $this->validate($request, ['mes'=>'required','anio'=>'required','id_sucursal' => 'required']);

         //recuperamos el mes
        $mes=$request->get('mes');
        //recuperamos el año
        $anio=$request->get('anio');
        $sucursal=$request->get('id_sucursal');
       
        //return (new ExportAsistenciaMensual(2019,10))->download('Asistencia.xlsx');
        return Excel::download(new ExportAsistenciaMensual($anio,$mes,$sucursal),'Asistencia.xlsx');
        
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
