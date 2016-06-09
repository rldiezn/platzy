<?php
/*
 * Btouch Inc
 * Ricardo Diez
 * Angeles Digital
 * */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Input;
use DB;
use Response;

class adwordsModel extends Model
{
    protected $table = "tbladwords";
    protected $primaryKey = "idtbladwords";
    protected $fillable = ['tiempo_mostrar','vigencia','click_count','show_count','fecha_inicio','hora_inicio','hora_fin','src_img','url_site','idtblclientedwords','palabra_clave'];
    protected $guarded = ['idtbladwords'];
    public $timestamps = false;

    public function getAdwords($request){
        $addwords=DB::table('tbladwords as a')
                      ->where("a.fecha_inicio", "<=", DB::raw("DATE(NOW())"))
                      ->where("a.hora_inicio", "<=", DB::raw("TIME(NOW())"))
                      ->where("a.hora_fin", ">=", DB::raw("TIME(NOW())"))
                      ->where("a.palabra_clave", "=", "$request->palabra_clave")
                      ->where(DB::raw("IF(DATE_ADD(a.fecha_inicio, INTERVAL a.vigencia DAY) >= NOW(),1,0)"), "=", "1")
                      ->get();

        return $addwords;
    }

    public static function getAllAdwords(){
        $all=DB::table('tbladwords as a')
            ->where("a.fecha_inicio", "<=", DB::raw("DATE(NOW())"))
            ->where("a.hora_inicio", "<=", DB::raw("TIME(NOW())"))
            ->where("a.hora_fin", ">=", DB::raw("TIME(NOW())"))
            ->where(DB::raw("IF(DATE_ADD(a.fecha_inicio, INTERVAL a.vigencia DAY) >= NOW(),1,0)"), "=", "1")
            ->orderby("a.palabra_clave","ASC")
            ->get();
        $adwords=array();
        $flag_palabra_clave="";
        $indice=0;
        foreach ($all as $ind=>$a){
            if($flag_palabra_clave!=$a->palabra_clave){
                $indice=0;
                $flag_palabra_clave=$a->palabra_clave;
                $adwords[$a->palabra_clave][$indice]=$a;
            }else{
                $indice++;
                $adwords[$flag_palabra_clave][$indice]=$a;
            }

        }
        return $adwords;
    }

    public function saveShow($request){

        $adwords = $this->find($request->idtbladwords);
        $adwords->show_count=$request->show_count;
        if(!$adwords->save()){
            return Response::json(array('estado'=>'0','msg'=>'Fallo','datos'=>$adwords));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Exito','datos'=>$adwords));
        }

    }

    public function saveClick($request){

        $adwords = $this->find($request->idtbladwords);
        $adwords->click_count=$request->click_count;
        if(!$adwords->save()){
            return Response::json(array('estado'=>'0','msg'=>'Fallo','datos'=>$adwords));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Exito','datos'=>$adwords));
        }

    }


}