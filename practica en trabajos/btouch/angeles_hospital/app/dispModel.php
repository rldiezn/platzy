<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class dispModel extends Model
{

	/*

		Función para distinguir de donde vienen las peticiones, Web o Mobile

	*/

    public function dispositivo($request) {
        if(isset($request->disp)){
            if ($request->disp === 'Mobile') {
                return true;
            } else {
                return false;
            }

        }else{
            return false;
        }
        
    }

    /*

		Función para obtener el status de cada peticion

		1 - En Revisión
		2 - Autorizado
		3 - Cita Solicitada
		4 - Por Confirmar
		5 - Confirmada
		6 - Re-agendada
		7 - Solicitada (cita solicitada)


        $encrypted = Crypt::encrypt('text');
        $decrypted = Crypt::decrypt($encrypted);

	*/

    public function status($tipoStatus) {

    	$status = DB::table('catstatus')->get();

    	foreach ($status as $nombre_status) {
    		if(Crypt::decrypt($nombre_status->catStatus) === $tipoStatus) {
    			$respuesta_status = $nombre_status->idcatStatus;
    		}
        }

        return $respuesta_status;

    }

}