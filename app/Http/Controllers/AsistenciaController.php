<?php

namespace App\Http\Controllers;
use App\Personal;
use App\Asistencia;
use App\AsistenciaMensual;
use Illuminate\Http\Request;
//usado para obtener fecha actual
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


use Alert;
class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

         return view('asistencia.home_asistencia');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        //
         return view('asistencia.index_asistencia');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //obtenemos el codigo de barras
        $cod_barras=$request->get('cod_barras');
        //consultamos si dicho codigo se encuentra registrado
        $empleado=Personal::where('cod_barras',$cod_barras)->first();

        if ($empleado !="") {
            # code...
            //return response()->json([$empleado])
            $fecha=Carbon::now();
            $dia=$fecha->format('d');
            $mes=$fecha->format('m');
            $anio=$fecha->format('Y');
            $hora=$fecha->toTimeString();

            $fecha=$fecha->toFormattedDateString();            

            $sql=Asistencia::where('cod_barras',$cod_barras)->where('fecha',$fecha)->first();

            if ($sql=="") {

                $sql2=Asistencia::create([
                        'cod_barras'=>$cod_barras,
                        'fecha'=>$fecha,
                        'hora_entrada'=>$hora,
                        'hora_salida'=>/*'00:00:00'*/$hora,
                        'hora_entrada2'=>'00:00:00',
                        'hora_salida2'=>'00:00:00',
                    ]);

                if ($sql2!=null) {
                    # code...
                    $sql3=AsistenciaMensual::where('cod_barras',$cod_barras)->where('mes',$mes)->where('anio',$anio)->first();

                    if ($sql3=="") {

                        $sql4=AsistenciaMensual::create([
                            'cod_barras'=>$cod_barras,
                            'mes'=>$mes,
                            'anio'=>$anio,

                        ]);
                        
                    }
                    switch ($dia) {
                            case 1:
                                # code...

                                $update=AsistenciaMensual::where('cod_barras',$cod_barras)->where('mes',$mes)->where('anio',$anio)->first();
                                $update->d1="1";
                                $update->save();
                                break;
                            case 2:
                                # code...

                                $update=AsistenciaMensual::where('cod_barras',$cod_barras)->where('mes',$mes)->where('anio',$anio)->first();
                                $update->d2="1";
                                $update->save();
                                break;
                            case 3:
                                # code...

                                $update=AsistenciaMensual::where('cod_barras',$cod_barras)->where('mes',$mes)->where('anio',$anio)->first();
                                $update->d3="1";
                                $update->save();
                                break;
                            case 4:
                                # code...

                                $update=AsistenciaMensual::where('cod_barras',$cod_barras)->where('mes',$mes)->where('anio',$anio)->first();
                                $update->d4="1";
                                $update->save();
                                break;
                            case 5:
                                # code...

                                $update=AsistenciaMensual::where('cod_barras',$cod_barras)->where('mes',$mes)->where('anio',$anio)->first();
                                $update->d5="1";
                                $update->save();
                                break;
                            case 6:
                                # code...
                            $update=AsistenciaMensual::where('cod_barras',$cod_barras)->where('mes',$mes)->where('anio',$anio)->first();
                                $update->d6="1";
                                $update->save();
                                break;
                            case 7:
                                # code...
                           $update=AsistenciaMensual::where('cod_barras',$cod_barras)->where('mes',$mes)->where('anio',$anio)->first();
                                $update->d7="1";
                                $update->save();
                                break;
                            case 8:
                                # code...

                                $update=AsistenciaMensual::where('cod_barras',$cod_barras)->where('mes',$mes)->where('anio',$anio)->first();
                                $update->d8="1";
                                $update->save();
                                break;
                            case 9:
                                # code...

                                $update=AsistenciaMensual::where('cod_barras',$cod_barras)->where('mes',$mes)->where('anio',$anio)->first();
                                $update->d9="1";
                                $update->save();
                                break;
                            case 10:
                                # code...

                                $update=AsistenciaMensual::where('cod_barras',$cod_barras)->where('mes',$mes)->where('anio',$anio)->first();
                                $update->d10="1";
                                $update->save();
                                break;
                            case 11:
                                # code...

                                $update=AsistenciaMensual::where('cod_barras',$cod_barras)->where('mes',$mes)->where('anio',$anio)->first();
                                $update->d11="1";
                                $update->save();
                                break;
                            case 12:
                                # code...

                                $update=AsistenciaMensual::where('cod_barras',$cod_barras)->where('mes',$mes)->where('anio',$anio)->first();
                                $update->d12="1";
                                $update->save();
                                break;
                            case 13:
                                # code...

                                $update=AsistenciaMensual::where('cod_barras',$cod_barras)->where('mes',$mes)->where('anio',$anio)->first();
                                $update->d13="1";
                                $update->save();
                                break;
                            case 14:
                                # code...

                                $update=AsistenciaMensual::where('cod_barras',$cod_barras)->where('mes',$mes)->where('anio',$anio)->first();
                                $update->d14="1";
                                $update->save();
                                break;
                            case 15:
                                # code...

                                $update=AsistenciaMensual::where('cod_barras',$cod_barras)->where('mes',$mes)->where('anio',$anio)->first();
                                $update->d15="1";
                                $update->save();
                                break;
                            case 16:
                                # code...

                                $update=AsistenciaMensual::where('cod_barras',$cod_barras)->where('mes',$mes)->where('anio',$anio)->first();
                                $update->d16="1";
                                $update->save();
                                break;
                            case 17:
                                # code...

                                $update=AsistenciaMensual::where('cod_barras',$cod_barras)->where('mes',$mes)->where('anio',$anio)->first();
                                $update->d17="1";
                                $update->save();
                                break;
                            case 18:
                                # code...

                                $update=AsistenciaMensual::where('cod_barras',$cod_barras)->where('mes',$mes)->where('anio',$anio)->first();
                                $update->d18="1";
                                $update->save();
                                break;
                            case 19:
                                # code...

                                $update=AsistenciaMensual::where('cod_barras',$cod_barras)->where('mes',$mes)->where('anio',$anio)->first();
                                $update->d19="1";
                                $update->save();

                                break;
                            case 20:
                                # code...

                                $update=AsistenciaMensual::where('cod_barras',$cod_barras)->where('mes',$mes)->where('anio',$anio)->first();
                                $update->d20="1";
                                $update->save();
                                break;
                            case 21:
                                # code...

                                $update=AsistenciaMensual::where('cod_barras',$cod_barras)->where('mes',$mes)->where('anio',$anio)->first();
                                $update->d21="1";
                                $update->save();
                                break;
                            case 22:
                                # code...

                                $update=AsistenciaMensual::where('cod_barras',$cod_barras)->where('mes',$mes)->where('anio',$anio)->first();
                                $update->d22="1";
                                $update->save();
                                break;
                            case 23:
                                # code...

                                $update=AsistenciaMensual::where('cod_barras',$cod_barras)->where('mes',$mes)->where('anio',$anio)->first();
                                $update->d23="1";
                                $update->save();
                                break;
                            case 24:
                                # code...

                                $update=AsistenciaMensual::where('cod_barras',$cod_barras)->where('mes',$mes)->where('anio',$anio)->first();
                                $update->d24="1";
                                $update->save();
                                break;
                            case 25:
                                # code...

                                $update=AsistenciaMensual::where('cod_barras',$cod_barras)->where('mes',$mes)->where('anio',$anio)->first();
                                $update->d25="1";
                                $update->save();
                                break;
                            case 26:
                                # code...

                                $update=AsistenciaMensual::where('cod_barras',$cod_barras)->where('mes',$mes)->where('anio',$anio)->first();
                                $update->d26="1";
                                $update->save();
                                break;
                            case 27:
                                # code...

                                $update=AsistenciaMensual::where('cod_barras',$cod_barras)->where('mes',$mes)->where('anio',$anio)->first();
                                $update->d27="1";
                                $update->save();
                                break;
                            case 28:
                                # code...

                                $update=AsistenciaMensual::where('cod_barras',$cod_barras)->where('mes',$mes)->where('anio',$anio)->first();
                                $update->d28="1";
                                $update->save();
                                break;
                            case 29:
                                # code...

                                $update=AsistenciaMensual::where('cod_barras',$cod_barras)->where('mes',$mes)->where('anio',$anio)->first();
                                $update->d29="1";
                                $update->save();
                                break;
                            case 30:
                                # code...

                                $update=AsistenciaMensual::where('cod_barras',$cod_barras)->where('mes',$mes)->where('anio',$anio)->first();
                                $update->d30="1";
                                $update->save();
                                break;
                            case 31:
                                # code...

                                $update=AsistenciaMensual::where('cod_barras',$cod_barras)->where('mes',$mes)->where('anio',$anio)->first();
                                $update->d31="1";
                                $update->save();
                                break;
                        }
                }

                if ($sql2!=null) {
                    $consulta=\DB::table('personal')->
                         select('personal.cod_barras','personal.nombre','personal.url_foto','asistencia.fecha','asistencia.hora_entrada','asistencia.hora_salida','asistencia.hora_entrada2','asistencia.hora_salida2')
                        ->join('asistencia','asistencia.cod_barras','=','personal.cod_barras')
                        ->where('asistencia.cod_barras',$cod_barras)
                        ->where('asistencia.fecha',$fecha)->first();
                    
                    /*alert()->success('Nombre :'.$consulta->nombre.'
                        Hora entrada 1° Turno:'.$consulta->hora_entrada,'Limon Almacenes S.A de C.V')->autoclose(3000);*/
                    return redirect()->route('asistencia.create')->with('success',$consulta);
                }

                 
                //return response()->json([$sql]);

            }else{
                /*$sql->hora_salida==0*/
                if ($sql->hora_entrada>0 && $sql->hora_salida==$sql->hora_entrada) {
                    # code...
                    $updateAsistencia1=Asistencia::where('cod_barras',$cod_barras)->where('fecha',$fecha)->first();
                    $updateAsistencia1->hora_salida=$hora;
                    $updateAsistencia1->save();

                if ($updateAsistencia1 !=null) {
                    $consulta=\DB::table('personal')->
                         select('personal.cod_barras','personal.nombre','personal.url_foto','asistencia.fecha','asistencia.hora_entrada','asistencia.hora_salida','asistencia.hora_entrada2','asistencia.hora_salida2')
                        ->join('asistencia','asistencia.cod_barras','=','personal.cod_barras')
                        ->where('asistencia.cod_barras',$cod_barras)
                        ->where('asistencia.fecha',$fecha)->first();

                        return redirect()->route('asistencia.create')->with('success',$consulta);
                }

                    
                }else{
                    if ($sql->hora_entrada2<='00:00:00') {
                    # code...
                    $updateAsistencia2=Asistencia::where('cod_barras',$cod_barras)->where('fecha',$fecha)->first();
                    $updateAsistencia2->hora_entrada2=$hora;
                    $updateAsistencia2->hora_salida2=$hora;
                    $updateAsistencia2->save();

                    if ($updateAsistencia2 !=null) {
                    $consulta=\DB::table('personal')->
                         select('personal.cod_barras','personal.nombre','personal.url_foto','asistencia.fecha','asistencia.hora_entrada','asistencia.hora_salida','asistencia.hora_entrada2','asistencia.hora_salida2')
                        ->join('asistencia','asistencia.cod_barras','=','personal.cod_barras')
                        ->where('asistencia.cod_barras',$cod_barras)
                        ->where('asistencia.fecha',$fecha)->first();

                    /*alert()->success('Nombre :'.$consulta->nombre.'
                        Hora Entrada 2° turno:'.$consulta->hora_entrada2,
                        'Limon Almacenes S.A de C.V')->autoclose(3000);
                        */
                    return redirect()->route('asistencia.create')->with('success',$consulta);

                }

                    
                    }else{
                        /*$sql->hora_salida2==='00:00:00'*/
                        if ($sql->hora_entrada2 > "00:00:00" && $sql->hora_salida2==$sql->hora_entrada2) {
                            # code...
                            $updateAsistencia3=Asistencia::where('cod_barras',$cod_barras)->where('fecha',$fecha)->first();
                            $updateAsistencia3->hora_salida2=$hora;
                            $updateAsistencia3->save();


                            if ($updateAsistencia3 !=null) {
                                $consulta=\DB::table('personal')->
                         select('personal.cod_barras','personal.nombre','personal.url_foto','asistencia.fecha','asistencia.hora_entrada','asistencia.hora_salida','asistencia.hora_entrada2','asistencia.hora_salida2')
                        ->join('asistencia','asistencia.cod_barras','=','personal.cod_barras')
                        ->where('asistencia.cod_barras',$cod_barras)
                        ->where('asistencia.fecha',$fecha)->first();

                               return redirect()->route('asistencia.create')->with('success',$consulta);
                             }
                                       
                        }

                    
                         //return response()->json([$sql]);

                    }
                }     

            } 
            return redirect()->route('asistencia.create')->with('warning','Jornada Laboral Completa');
            
        }else {
            //$proveedor=Asistencia::where('cod_barras',$cod_barras)->get();
            //if ($proveedor->isNotEmpty()) {
                # code...
           //     return response()->json([$proveedor]);
            //}else{

               return redirect()->route('asistencia.create')->with('warning','Sin Registros Comunicate Con El Administrador');        
            
                //return response()->json(['ERROR'=>'SIN REGISTRO POR FAVOR COMUNICATE CON EL ADMINISTRADOR']);
           // }
            
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function show(Asistencia $asistencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Asistencia $asistencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asistencia $asistencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asistencia $asistencia)
    {
        //
    }
}
