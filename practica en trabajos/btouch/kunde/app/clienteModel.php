<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Response;
use DB;

class clienteModel extends Model
{

    protected $table = "tblcliente";
    protected $primaryKey = "idtblcliente";
    protected $fillable = ['idusers','idcatcantidadempleados','idcatpais','dominio','nombrecliente'];
    protected $guarded = ['idtblcliente'];
    public $timestamps = false;


    public function users()
    {
        return $this->belongsTo('App\User','idusers','id');//model,local_key,parent_key
    }

    public function findDomiand($request){
        $client = $this->where('dominio','=',$request->dominio)->get();
        return $client;
    }



}
