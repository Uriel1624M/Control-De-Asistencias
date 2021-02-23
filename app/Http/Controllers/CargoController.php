<?php

namespace App\Http\Controllers;

use App\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
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
       // $cargos = Cargo::orderBy('id', 'desc')->simplePaginate(3);
     $cargos = Cargo::Buscar($request->get('cargo'))->orderBy('id', 'asc')->paginate(4); return view('cargos.index_cargos',compact('cargos'));
                
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('cargos.create_cargos');
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
        $this->validate($request, ['cargo' => 'required|unique:cargo']);
        Cargo::create($request->all());
        return redirect()->route('cargos.index')->with('info','Registro Creado Satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function show(Cargo $cargo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function edit(Cargo $cargo)
    {
        //
         return view('cargos.edit_cargos',compact('cargo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $cargo = Cargo::find($id);
        $cargo->cargo = $request->get('cargo');
        $cargo->save();
        return redirect()->route('cargos.index')->with('info','Registro Actualizado Satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         Cargo::find($id)->delete();
         return redirect()->route('cargos.index')->with('info','Registro eliminado satisfactoriamente');
    }
}
