<?php

namespace App\Http\Controllers;

use App\courseModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class courseController extends Controller
{
    public function crearCurso(Request $request){
        $course = new courseModel();
        $response=$course->saveSingleCourse($request);
        return $response;
    }

    public function crearCursoWeb(Request $request){
        $course = new courseModel();
        $response=$course->saveSingleCourseWeb($request);
        return $response;
    }

    public function editarCurso(Request $request){
        $course = new courseModel();
        $response=$course->editSingleCourse($request);
        return $response;
    }

    public function editarCursoWeb(Request $request){
        $course = new courseModel();
        $response=$course->editSingleCourseWeb($request);
        return $response;
    }

    public function eliminarCurso(Request $request){
        $course = new courseModel();
        $response=$course->eliminarCurso($request);
        return $response;
    }

    public function obtenerCurso(Request $request){
        $course = new courseModel();
        $response=$course->obtenerCurso($request);
        return $response;
    }

    public function obtenerCursos(Request $request){
        $course = new courseModel();
        $response=$course->obtenerCursos($request);
        return $response;
    }

}
