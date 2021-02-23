<?php

namespace App\Http\Controllers;
use App\User;
use App\Roles;


use Illuminate\Http\Request;

class UsuariosController extends Controller
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
        $usuarios = User::Buscar($request->get('nombre'))->orderBy('id', 'asc')->paginate(3);
        return view('usuarios.index_usuarios',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $roles = Roles::all()
        ->sortBy('id', SORT_NATURAL | SORT_FLAG_CASE)
        ->pluck('nombre', 'id');
        return view('auth.register',compact('roles'));
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
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'id_rol'=>'required|string',
            'password' => 'required|string|min:6|confirmed',
       ]);
        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'id_rol' => $request->get('id_rol'),
            'password' => bcrypt($request->get('password')),
        ]);
         return redirect()->route('usuarios.index')->with('info','Registro Actualizado Satisfactoriamente');
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
    public function edit(User $usuario)
    {
        //

         $perfil = Roles::all()
         ->sortBy('id', SORT_NATURAL | SORT_FLAG_CASE)
         ->pluck('nombre', 'id');
        return view('usuarios.edit_usuario',compact('usuario','perfil'));

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
        //Validamos los datos
        $this->validate($request, ['name' => 'required','id_rol'=>'required']);
        $user = User::find($id);
        $user->name = $request->get('name');  
        $user->email = $request->get('email');
        $user->id_rol=$request->get('id_rol');
        $user->save();

        return redirect()->route('usuarios.index');
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
        User::find($id)->delete();
         return redirect()->route('usuarios.index')->with('info','Registro eliminado satisfactoriamente');

    }
}
