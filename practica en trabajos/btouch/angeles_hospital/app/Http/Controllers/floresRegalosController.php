<?php

namespace App\Http\Controllers;

use App\floresRegalosModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class floresRegalosController extends Controller
{
    public function guardar(Request $request){
        $experience = new floresRegalosModel();
        $response=$experience->guardar($request);
        return $response;
    }

    public function editar(Request $request){
        $experience = new floresRegalosModel();
        $response=$experience->editar($request);
        return $response;
    }

    public function editarCustom(Request $request){
        $experience = new floresRegalosModel();
        $response=$experience->editarCustom($request);
        return $response;
    }

    public function obtener($idFlores){
        $experience = new floresRegalosModel();
        $response=$experience->obtener($idFlores);
        return $response;
    }

    public function obtenerTodos(Request $request){
        $experience = new floresRegalosModel();
        $response=$experience->obtenerTodos($request);
        return $response;
    }

    public function cargarCSV(Request $request){
        $experience = new floresRegalosModel();
        $response=$experience->cargarCSV($request);
        return $response;
    }
    
}
