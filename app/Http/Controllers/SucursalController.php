<?php

namespace App\Http\Controllers;

use App\Sucursal;
use Illuminate\Http\Request;

class SucursalController extends Controller
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
    $sucursal = Sucursal::Buscar($request->get('nombre'))->orderBy('id', 'desc')->paginate(3);

        return view('sucursal.index_sucursal',compact('sucursal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('sucursal.create_sucursal');
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
        $this->validate($request, ['nombre' => 'required|unique:sucursal']);
        Sucursal::create($request->all());
        return redirect()->route('sucursal.index')->with('info','Registro Creado Sastisfactoriamante');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function show(Sucursal $sucursal)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function edit(Sucursal $sucursal)
    {
        //
         return view('sucursal.edit_sucursal',compact('sucursal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validamos los datos
        $this->validate($request, ['nombre' => 'required|unique:sucursal']);
        //
        $sucursal = Sucursal::find($id);
        $sucursal->nombre = $request->get('nombre');
        $sucursal->save();
        return redirect()->route('sucursal.index')->with('info','Registro Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Sucursal::find($id)->delete();
         return redirect()->route('sucursal.index')->with('info','Registro eliminado satisfactoriamente');
    }
}
