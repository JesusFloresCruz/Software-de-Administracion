<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Usuario;
use App\Proyecto;
use App\Tarea;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Proyecto::all();
        $users = Usuario::all();

        return view('user.index', [ 'users' => $users,
                'projects' => $projects
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->telefono);
        $this->validate($request,[
                'nombre'    => 'required',
                'apellido'  => 'required',
                'edad'      => 'required',
                'direccion' => 'required',
                'telefono'  => 'required',
                'tipo'      => 'required',
                'rol'       => 'required',
                'proyecto'  => 'required'
            ]);

        $newUser = new Usuario;
        $newUser->nombre      = $request->nombre;
        $newUser->apellidos   = $request->apellido;
        $newUser->edad        = $request->edad;
        $newUser->direccion   = $request->direccion;
        $newUser->telefono    = $request->telefono;
        $newUser->tipo        = $request->tipo;
        $newUser->rol         = $request->rol;
        $newUser->id_proyecto = $request->proyecto;
        $newUser->save();

        return redirect('usuario');
    }

    public function destroy($usuario)
    {
        $responseUser = Usuario::find($usuario)->delete();
        $responseTask = Tarea::where('id_usuario',$usuario)->delete();
        return redirect('usuario');
    }
}
