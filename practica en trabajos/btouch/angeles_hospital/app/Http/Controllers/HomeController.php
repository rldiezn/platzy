<?php
/*
 * Btouch Inc
 * Ricardo Diez
 * Angeles Digital
 * */

namespace App\Http\Controllers;

use App\adwordsModel;
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
        $this->adWords= adwordsModel::getAllAdwords();

    }

    protected $redirectTo = '/doctor/listadoDoctores';

    public function index(){
        return view($this->isDoctor['home'],['menu'=>$this->arrayMenu,'isDoctor'=>$this->isDoctor,'adWords'=>$this->adWords]);
    }
    
    public function getAdwords(Request $request){
        $adwords = new adwordsModel();
        $result=$adwords->getAdwords($request);
        return $result;
    }

    public function saveShow(Request $request){        
        $adwords = new adwordsModel();
        $result=$adwords->saveShow($request);
        return $result;
    }

    public function saveClick(Request $request){        
        $adwords = new adwordsModel();
        $result=$adwords->saveClick($request);
        return $result;
    }

}


