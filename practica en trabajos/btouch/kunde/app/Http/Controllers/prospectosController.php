<?php

namespace App\Http\Controllers;

use App\courseModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class prospectosController extends Controller
{

    public function textNewProspecto(){
        return view("prospectos.prospectos");
    }

    public function misProspectos(){
        return view("prospectos.mis-prospectos");
    }
}
