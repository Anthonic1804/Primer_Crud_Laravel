<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; //LIBRERIA PARA GENERAR REPORTES
use Carbon\Carbon; //LIBRERIA PARA CAPTURA DE FECHAS. -> Carbon::now()

class ProjectController extends Controller
{
    //FUNCION DE LA VISTA PRINCIPAL, MOSTRANDO EL LISTADO DE PROYECTOS REGISTADOS
    public function index(){
        $projects = Project::orderBy('id', 'desc')->get();
        $total = Project::count();
        return view('project.home', compact(['projects', 'total']));
    }

    //FUNCION PARA REDIRECCION AL FORMULARIO DE CREACION DE PROYECTOS
    public function create(){
        return view('project.create');
    }

    //FUNCION PARA GUARDAR UN NUEVO PROYECTO
    public function save(Request $request){
        $validation = $request->validate([
            'NombreProyecto' => 'required',
            'Fuentefondos' => 'required',
            'MontoPlanificado' => 'required',
            'MontoPatrocinado' => 'required',
            'MontoFondosPropios' => 'required',
        ]);

        $data = Project::create($validation);
        if($data){
            session()->flash('success', 'Projecto Agregado Correctamente!!');
            return redirect(route('projects'));
        }else{
            session()->flash('error', 'Error al Registrar el Proyecto');
            return redirect(route('projects/create'));
        }

    }

    //FUNCION PARA REDIRECCIONAR AL FORMULARIO DE EDICION DE PROYECTOS
    public function edit($id){
        $projects = Project::findOrFail($id);
        return view('project.update', compact('projects'));
    }

    //FUNCION PARA ELIMINAR UN PROYECTO
    public function delete($id){
        $projects = Project::findOrFail($id)->delete();
        if($projects){
            session()->flash('success', 'Projecto eliminado Correctamente!!');
            return redirect(route('projects'));
        }else{
            session()->flash('error', 'Error al eliminar el Proyecto');
            return redirect(route('projects'));
        }
    }

    //FUNCION PARA ACTUALIZAR LA INFORMACION DE LOS PROYECTOS
    public function update(Request $request, $id){
        $projects = Project::findOrFail($id);
        $nombre = $request->NombreProyecto;
        $fuente = $request->Fuentefondos;
        $planificado = $request->MontoPlanificado;
        $patrocinado = $request->MontoPatrocinado;
        $propios = $request->MontoFondosPropios;

        $projects->NombreProyecto = $nombre;
        $projects->Fuentefondos = $fuente;
        $projects->MontoPlanificado = $planificado;
        $projects->MontoPatrocinado = $patrocinado;
        $projects->MontoFondosPropios = $propios;
        $data = $projects->save();
        
        if($data){
            session()->flash('success', 'Projecto Actualizado Correctamente!!');
            return redirect(route('projects'));
        }else{
            session()->flash('error', 'Error al Actualizar el Proyecto');
            return redirect(route('projects/update'));
        }
    }

    //FUNCION PARA GENERAR EL REPORTE PDF
    public function pdf(){
        $projects = Project::all();
        $pdf = Pdf::loadView('project.pdf', compact('projects'));
        return $pdf->stream();
    }

}
