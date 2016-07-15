<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\User;
use DB;
use Illuminate\Support\Facades\Response;


class AuthenticateController extends Controller
{

    public function __construct()
    {
        // Apply the jwt.auth middleware to all methods in this controller
        // except for the authenticate method. We don't want to prevent
        // the user from retrieving their token if they don't already have it
        $this->middleware('jwt.auth', ['except' => ['authenticate']]);
    }

    public function index()
    {
        // Retrieve all the users in the database and return them
        $users = User::all();
        return $users;
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                //return response()->json(['error' => 'invalid_credentials'], 401);
                return response()->json(["result" => false, "token" => 'invalido']);
            }
            
            $tokken = response()->json([ "token" => $token]);

            DB::table('users')->where('email', $request->email)->update(['remember_token' => $token]);

            $role = DB::table('users')
            ->join('tbldr', 'users.id', '=', 'tbldr.idtbluser')
            ->select('tbldr.*', 'users.role')
            ->where("tbldr.tblDOctoremail", "=", $request->email)
            ->get();

            if(!$role){
               $role = DB::table('users')
                ->join('tlbpaciente', 'users.id', '=', 'tlbpaciente.idtblusers')
                ->select('tlbpaciente.*', 'users.role')
                ->where("tlbpaciente.tblpacienteemail", "=", $request->email)
                ->get();
            }

            if (!$role) {
                $role = DB::table('users')
                ->join('tblasistente', 'users.id', '=', 'tblasistente.idasistente')
                ->select('tblasistente.*', 'users.role')
                ->where("tblasistente.tblasistenteEmail", "=", $request->email)
                ->get(); 
            }
            
        } catch (JWTException $e) {
            // something went wrong
            //return response()->json(['error' => 'could_not_create_token'], 500);
            return response()->json(["result" => false, "token" => 'no creado']);
        }

        // if no errors are encountered we can return a JWT
        return response()->json(["result" => $credentials, "token" => $token, "role" => $role[0]]);
        //return $token;*/

        //return $credentials;
    }
}