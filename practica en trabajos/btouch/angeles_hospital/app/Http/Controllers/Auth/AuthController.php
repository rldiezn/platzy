<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\pacienteModel;
use App\contactoPacienteModel;
use App\Http\Requests;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use DB;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;


    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout','getLogout']]);
    }

    public function getLogout()
    {
        $this->logout();
        //Session::flush();
        return redirect('login');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        $user = new User([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        $user->role = 'paciente';
        $user->save();
        $insert_id=$user->id;

        $paciente = new pacienteModel(
            [
                'idtblusers'=>$insert_id,
                'tblpacientename'=>$data['name'],
                'tblpacientepaterno'=>$data['aPaterno'],
                'tblpacientematerno'=>$data['aMaterno'],
                'tblpacienteemail'=>$data['email'],
                'tblpacienterfc'=>$data['rfc']
            ]
        );
        $paciente->save();
        $insert_id_paciente=$paciente->idtblpaciente;

        $contactoPaciente= new contactoPacienteModel([
            'idtblpaciente'=>$insert_id_paciente
        ]);

        $contactoPaciente->save();

        return $user;
    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    /* public function redirectPath()
     {
        return route('home');
     }*/
}