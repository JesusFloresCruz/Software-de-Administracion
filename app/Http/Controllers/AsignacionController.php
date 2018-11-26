<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Tarea;
use App\Proyecto;
use App\Usuario;

class AsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = DB::select("SELECT `proyecto`.`id`,`proyecto`.`nombre`,
                   DATEDIFF(`proyecto`.`fecha_fin`,`proyecto`.`fecha_inicio`) as `days`,
                   COUNT(`tarea`.`id_proyecto`) as `tasks`
            FROM `proyecto`, `tarea`
            WHERE `proyecto`.`id` = `tarea`.`id_proyecto`
            GROUP BY `tarea`.`id_proyecto`");

        $taskOut = DB::select("SELECT `proyecto`.`id`,`proyecto`.`nombre`, '0' as `tasks`, '0' as `days`
FROM `proyecto`, `tarea`
WHERE `proyecto`.`id` NOT IN ( SELECT `tarea`.`id_proyecto`
                             FROM `proyecto`, `tarea`
                            WHERE `proyecto`.`id` = `tarea`.`id_proyecto`
GROUP BY `tarea`.`id_proyecto`)
GROUP BY `proyecto`.`id`");
       return view('asignacion.index',[
            'projects' => array_merge($projects, $taskOut)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($proyecto)
    {
        $project = Proyecto::where('id',$proyecto)->first();
        $users = Usuario::where('id_proyecto',$proyecto)->get();
        return view('asignacion.create',[
                'proyecto' => $project,
                'usuarios' => $users,
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
        $this->validate($request,[
            'posicion' => 'required',
            'nombre' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'progreso' => 'required',
            'proyecto' => 'required',
            'usuario' => 'required'
            ]);
        $task               = new Tarea;
        $task->posicion     = $request->posicion;
        $task->nombre       = $request->nombre;
        $task->fecha_inicio = $this->formatDateTime($request->fecha_inicio);
        $task->fecha_fin    = $this->formatDateTime($request->fecha_fin);
        $task->progreso     = $request->progreso;
        $task->id_proyecto  = $request->proyecto;
        $task->id_usuario  = $request->usuario;
        $task->save();

        return redirect("/asignacion/".$request->proyecto);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $task = DB::select("SELECT `tarea`.`id`,`tarea`.`posicion`,`tarea`.`nombre`
            ,`tarea`.`fecha_inicio`, `tarea`.`fecha_fin`, `tarea`.`progreso`
            , CONCAT_WS(' ', `usuarios`.`nombre`,`usuarios`.`apellidos`) as `usuario`
            FROM `tarea`, `usuarios`
            WHERE `usuarios`.`id_proyecto` = ? AND
            `tarea`.`id_usuario` = `usuarios`.`id`", [ $request->proyecto ]);
        $old = DB::select("SELECT `tarea`.`nombre` as `desc`, DATEDIFF(CURDATE(), `tarea`.`fecha_fin`) as `days`,
            CONCAT_WS(' ', `usuarios`.`nombre`,`usuarios`.`apellidos`) as `user`
                FROM `tarea`, `usuarios`
                WHERE `tarea`.`fecha_fin` <= CURDATE() AND
                `usuarios`.`id_proyecto` = ? AND
                `tarea`.`id_usuario` = `usuarios`.`id` ", [ $request->proyecto ]);
        return view('asignacion.task',[
                'olds' => $old,
                'tasks' => $task,
                'project'=> $request->proyecto
            ]);
    }

    public function ganttData($project)
    {
        $task = DB::select("SELECT CONCAT_WS(' ', 'Tarea -',`tarea`.`posicion`) as `tarea`,
            `tarea`.`fecha_inicio`, `tarea`.`fecha_fin`
            FROM `tarea`
            WHERE `tarea`.`id_proyecto` = ?
            ORDER BY `tarea`.`posicion` DESC", [ $project ]);
        $taskDetail = array();
        foreach ($task as $item)
        {
            array_push($taskDetail, array(
                'tarea' => $item->tarea,
                'inicio' => $this->jsDateParser($item->fecha_inicio),
                'fin' => $this->jsDateParser($item->fecha_fin),
            ));
        }
        return response()->json($taskDetail);
    }

    public function jsDateParser($date)
    {
        return implode(',', explode('-', $date));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($proyecto,$tarea)
    {
        $taskDetail     = Tarea::where('id',$tarea)->first();
        $projectDetails = Proyecto::where('id',$proyecto)->first();
        $usersDetail    = Usuario::where('id_proyecto',$proyecto)->get();
//        dd($taskDetail);
        return view('asignacion.update',[
                'tarea' => $taskDetail,
                'proyecto' => $projectDetails,
                'usuarios' => $usersDetail,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'posicion' => 'required',
            'nombre' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'progreso' => 'required',
            'tarea' => 'required'
            ]);
        $task               = Tarea::find($request->tarea);
        $task->posicion     = $request->posicion;
        $task->nombre       = $request->nombre;
        $task->fecha_inicio = $this->formatDateTime($request->fecha_inicio);
        $task->fecha_fin    = $this->formatDateTime($request->fecha_fin);
        $task->progreso     = $request->progreso;
        $task->id_usuario   = $request->usuario;
        $task->save();

        return redirect("/asignacion/".$task->id_proyecto);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($proyecto,$tarea)
    {
        $task = Tarea::find($tarea)->delete();
        return redirect('/asignacion/'.$proyecto);
    }
}
