<?php
/*
 * Btouch Inc
 * Ricardo Diez
 * Angeles Digital
 * */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\menuModel;

class HomeController extends Controller
{

    public function __construct()
    {
        $menu = new menuModel();
        $this->arrayMenu= $menu->generateMenu();
        $this->isDoctor= $menu->isDoctor();

    }

    protected $redirectTo = '/doctor/listadoDoctores';

    public function index(){
        return view('buscador',['menu'=>$this->arrayMenu,'isDoctor'=>$this->isDoctor]);
    }
}


