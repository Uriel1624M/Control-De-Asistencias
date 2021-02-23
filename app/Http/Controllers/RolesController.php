<?php

namespace App\Http\Controllers;

use App\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
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
        $roles = Roles::Buscar($request->get('nombre'))->orderBy('id', 'asc')->paginate(3);
        
        return view('rol.rol_index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('rol.create_rol');
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
        $this->validate($request, ['nombre' => 'required|unique:roles']);
        Roles::create($request->all());
        return redirect()->route('rol.index')->with('success','Registro Creado Sastisfactoriamante');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function show(Roles $roles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function edit ($id)
    {
        //
        $roles=Roles::find($id);
       // return response()->json([$roles]);
        return view('rol.edit_rol',compact('roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $this->validate($request, ['nombre' => 'required|unique:roles']);
        
        $rol = Roles::find($id);
        $rol->nombre = $request->get('nombre');
        $rol->save();
        return redirect()->route('rol.index')->with('info','Registro Actualizado Satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Roles::find($id)->delete();
         return redirect()->route('rol.index')->with('info','Registro eliminado satisfactoriamente');
    }
}
