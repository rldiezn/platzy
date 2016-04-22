<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Response;

class dispModel extends Model
{

    public function dispositivo($request) {

        if ($request->disp === 'Mobile') {
            return true;
        } else {
            return false;
        }
        

    }

}