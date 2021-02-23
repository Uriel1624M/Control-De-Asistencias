<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
class DepartamentoController extends Controller
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
        $departamento = Departamento::Buscar($request->get('dep'))->orderBy('id', 'asc')->paginate(4);
        //$departamento = Departamento::orderBy('id', 'desc')->simplePaginate(3);

        return view('departamento.index_departamento',compact('departamento'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departamento.create_departamento');
       	
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //Validamos los datos
        $this->validate($request, ['departamento' => 'required|unique:departamento']);
        Departamento::create($request->all());
        return redirect()->route('departamento.index')->with('success','Registro Creado Sastisfactoriamante');
       
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Departamento $departamento)

    {
       return view('departamento.edit_departamento',compact('departamento'));
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)    {
        
        $this->validate($request, ['departamento' => 'required|unique:departamento']);
        //
        $departamento = Departamento::find($id);
        $departamento->departamento = $request->get('departamento');
        $departamento->save();
        return redirect()->route('departamento.index')->with('info','Registro Actualizado Correctamente');
       
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
         Departamento::find($id)->delete();
        return redirect()->route('departamento.index')->with('info','Registro eliminado satisfactoriamente');
    }
}
