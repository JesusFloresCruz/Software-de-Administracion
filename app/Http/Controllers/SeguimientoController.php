<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tarea;
use App\Proyecto;
use DB;
use Storage;

class SeguimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $task = Tarea::orderBy('posicion','DESC')->get();
        $projects = Proyecto::all();
        $listProject = new Collection;
        foreach ($projects as $project) {
            $tasks = Tarea::where('id_proyecto',$project->id)->get();
            $listProject->push(Collection::make([
                    'id'     => $project->id,
                    'nombre' => $project->nombre,
                    'tareas' => $tasks,
                ])
            );
        }
        return view('seguimiento.index',[
                'projects' => $listProject->toArray(),
            ]);
    }

    public function tasks()
    {
        $tasks = DB::select("SELECT `tarea`.`id_proyecto` as `proyecto`, `tarea`.`id` as `tarea`, `tarea`.`posicion` , `tarea`.`nombre` as `nombre` ,`tarea`.`fecha_inicio` as `fecha_inicio`, `tarea`.`fecha_fin` as `fecha_fin` FROM `tarea`, `proyecto` 
            WHERE `proyecto`.`id` = `tarea`.`id_proyecto`
            ORDER BY `tarea`.`id_proyecto`, `tarea`.`posicion`");
        $response = array();

        foreach ($tasks as $item) {
            $task = [
                'name' => $item->posicion,
                'desc' => $item->nombre,
                'values' => [
                    'to' => 'Date('.$item->fecha_inicio.')',
                    'from' => 'Date('.$item->fecha_fin.')',
                ],
            ];
            array_push($response, $task);
        }
        return response()->json($response);
    }

    public function taskParser(){
        Storage::disk('public')->put('tasks.json', $this->tasks());
        return Storage::disk('public')->get('tasks.json');
    }
}
