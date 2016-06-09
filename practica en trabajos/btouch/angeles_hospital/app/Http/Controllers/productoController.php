<?php
/*
 * Btouch Inc
 * Ricardo Diez
 * Angeles Digital
 * */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\hospitalModel;
use App\menuModel;
use App\productoModel;


class productoController extends Controller
{

    public function show($idcatHospital,$idCatproducto)
    {
        $menu = new menuModel();
        $arrayMenu= $menu->generateMenu();
        $isDoctor= $menu->isDoctor();
        $producto=new productoModel();
        $productoProfile=$producto->obtenerProducto($idcatHospital,$idCatproducto);
        return view('producto.perfil-producto',['producto'=>$productoProfile,'menu'=>$arrayMenu,'isDoctor'=>$isDoctor]);
    }


    public function listarProductos(){
        $menu = new menuModel();
        $arrayMenu= $menu->generateMenu();
        $isDoctor= $menu->isDoctor();
        $hospital = new productoModel();
        $arrayServicios=$hospital->listarProductos();
        return view('producto.show-all-producto',['producto'=>$arrayServicios,'menu'=>$arrayMenu,'isDoctor'=>$isDoctor]);
    }

    public function listarServiciosLimit(Request $request){
        $servicio=new productoModel();
        $serviciotable=$servicio->listarProductosLimit($request);
        return $serviciotable;
    }

    public function getAll()
    {
        return productosModel::all();
    }

}
