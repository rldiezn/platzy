<?php

namespace App\Http\Controllers;

use App\courseModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\clienteModel;

class clienteController extends Controller
{
    public function obtenerDominio(Request $request){
        $cliente = new clienteModel();
        $response=$cliente->findDomiand($request);
        return $response;
    }

}
