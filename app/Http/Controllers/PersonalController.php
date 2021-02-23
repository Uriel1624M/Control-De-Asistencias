<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection as Collection;
use App\Personal;
//importacion de modelos externos
use App\Cargo;
use App\Departamento;
use App\Direccion;
use App\Sucursal;
use Illuminate\Http\Request;
//Importacion de la liberia DB
use Illuminate\Support\Facades\DB;
//usado para obtener fecha actual
use Carbon\Carbon;

class PersonalController extends Controller
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
    public function index(Request $request)
    {
        //
        $personal = Personal::Buscar($request->get('persona'))->orderBy('id', 'desc')->paginate(4);
        return view('personal.index_personal',compact('personal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //A continuacion cargamos los datos guardados en las tablas asociadas a ala tabla personal
        $cargo = Cargo::all()
        ->sortBy('id', SORT_NATURAL | SORT_FLAG_CASE)
        ->pluck('cargo', 'id');

        $departamento= Departamento::all()
        ->sortBy('id', SORT_NATURAL | SORT_FLAG_CASE)
        ->pluck('departamento', 'id');

        $sucursal= Sucursal::all()
        ->sortBy('id', SORT_NATURAL | SORT_FLAG_CASE)
        ->pluck('nombre', 'id');

        //retornamos ala vista para crear nuevo personal
        return view('personal.create_personal',
        compact('cargo','departamento','sucursal'));
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
        $this->validate($request, ['cod_barras'=>'numeric|unique:personal|required','url_imagen'=>'required','codigo_postal' => 'numeric|required','telefono'=>'required|string|min:10|max:12']);

    
        $file= $request->file('url_imagen');
        $extension = $file->getClientOriginalExtension();

        //obtenemos el nombre del archivo
        $nombre = "IMG_".time().'.'. $extension;
        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('local')->put($nombre,\File::get($file));

        //
        $direccion=Direccion::create([
            'calle'=>$request['calle'],
            'numero'=>$request['numero'],
            'colonia'=>$request['colonia'],
            'codigo_postal'=>$request['codigo_postal'],
            'localidad'=>$request['localidad'],
        ]);
        //SELECT FIRST 1 "id" FROM "direccion" ORDER BY "id" DESC;
       // $query=DB::select('SELECT FIRST 1 "id" FROM "direccion" ORDER BY "id" DESC')->pluck('id');
     $id= Direccion::all()->sortBy('id', SORT_NATURAL | SORT_FLAG_CASE)->pluck( 'id');

        
      $persona=Personal::create([
            'cod_barras'=>$request->get('cod_barras'),
            'nombre'=>$request->get('nombre'),
            'url_foto'=>$nombre,
            'fecha_nacimiento'=>$request->get('fecha_nacimiento'),
            'telefono'=>$request->get('telefono'),
            'id_direccion'=>$id->last(),
            'id_cargo'=>$request->get('id_cargo'),
            'id_departamento'=>$request->get('id_departamento'),
            'id_sucursal'=>$request->get('id_sucursal')

        ]);

        return redirect()->route('personal.index')->with('info','Registro Creado satisfactoriamente');
        //return response()->json($query);
      //return $query;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Personal $personal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(Personal $personal)
    {
        //
         $cargo = Cargo::all()
         ->sortBy('id', SORT_NATURAL | SORT_FLAG_CASE)
         ->pluck('cargo', 'id');

        $departamento= Departamento::all()
        ->sortBy('id', SORT_NATURAL | SORT_FLAG_CASE)
        ->pluck('departamento', 'id');

        $sucursal= Sucursal::all()
        ->sortBy('id', SORT_NATURAL | SORT_FLAG_CASE)
        ->pluck('nombre', 'id');
       
         return view('personal.edit_personal',
            compact('personal','departamento','cargo','sucursal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personal $personal)
    {
        //validacion de los datos
        $this->validate($request, ['calle' => 'required', 'numero' => 'required', 'colonia' => 'required', 'codigo_postal' => 'numeric:required', 'localidad' => 'required']);

                $iddireccion=$personal->id_direccion;
                $direccion=Direccion::find($iddireccion);
                $direccion->calle= $request->get('calle');
                $direccion->numero= $request->get('numero');
                $direccion->colonia= $request->get('colonia');
                $direccion->codigo_postal= $request->get('codigo_postal');
                $direccion->localidad= $request->get('localidad');
                $direccion->save();

        if ($file = $request->file('archivo') != null) {
            /*
            *Revisamos si existe la fotografia del empleado.
            */
            if (\Storage::exists($personal->url_foto)) {
                # si la fotografia existe procedemos a eliminarla
                \Storage::delete($personal->url_foto);
            }
            /*
             *Recuperamos la imagen y prsesamos para guardarla
            */
            $file= $request->file('archivo');
            $extension = $file->getClientOriginalExtension();

            //obtenemos el nombre del archivo
            $nombre = "IMG_".time().'.'. $extension;
            //indicamos que queremos guardar un nuevo archivo en el disco local
            \Storage::disk('local')->put($nombre,\File::get($file));

            $personal=Personal::find($personal->id);
            $personal->cod_barras=$request->get('cod_barras');
            $personal->nombre=$request->get('nombre');
            $personal->url_foto=$nombre;
            $personal->fecha_nacimiento=$request->get('fecha_nacimiento');
            $personal->telefono=$request->get('telefono');
            $personal->id_cargo=$request->get('id_cargo');
            $personal->id_departamento=$request->get('id_departamento');
            $personal->id_sucursal=$request->get('id_sucursal');
            $personal->save();
        
        }else{
            $personal=Personal::find($personal->id);
            $personal->cod_barras=$request->get('cod_barras');
            $personal->nombre=$request->get('nombre');
            $personal->fecha_nacimiento=$request->get('fecha_nacimiento');
            $personal->telefono=$request->get('telefono');
            $personal->id_cargo=$request->get('id_cargo');
            $personal->id_departamento=$request->get('id_departamento');
            $personal->id_sucursal=$request->get('id_sucursal');
            $personal->save();

        }
        return redirect()->route('personal.index')->with('info','Registro Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $persona=Personal::find($id);
        $id_direc=$persona->id_direccion;
        $persona->delete();
        $direccion=Direccion::find($id_direc)->delete();;
        return redirect()->route('personal.index')->with('info','Registro Eliminado Satisfactoriamente');
    }
}
