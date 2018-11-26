<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Proyecto;
use App\Tarea;
use App\Usuario;

use Carbon\Carbon;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Proyecto::all();        
        return view('project.index', [ 'project' => $data ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'descripcion' => 'required',
        ]);

        $proyecto               = new Proyecto;
        $proyecto->nombre       = $request->nombre;
        $proyecto->fecha_inicio = $this->formatDateTime($request->fecha_inicio);
        $proyecto->fecha_fin    = $this->formatDateTime($request->fecha_fin);
        $proyecto->descripcion  = $request->descripcion;
        $proyecto->save();
        
        return redirect('proyecto');
    }

    public function destroy($proyecto){
        $user    = Usuario::where('id_proyecto',$proyecto)->delete();
        $tasks   = Tarea::where('id_proyecto',$proyecto)->delete();
        $project = Proyecto::find($proyecto)->delete();

        return redirect('proyecto');
    }
}
