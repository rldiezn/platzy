<?php

namespace App\Http\Controllers\Auth;

use App\clienteModel;
use App\User;
use Validator;
use Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

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
            'email' => 'required|max:255|unique:users',
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
            'paterno' => $data['paterno'],
            'materno' => $data['materno'],
//            'email' => $data['email'].'@'.$data['dominio'],
            'email' => $data['email'],
            'puesto' => $data['puesto'],
            'role' => 'admin',
            'password' => bcrypt($data['password']),
        ]);
        $user->role = 'admin';
        $user->save();
        $insert_id=$user->id;

        $cliente = new clienteModel(
            [
                'idusers'=>$insert_id,
                'idcatcantidadempleados'=>$data['idcatcantidadempleados'],
//                'idcatpais'=>$data['idcatpais'],
                'idcatpais'=>'1',//mexico
//                'dominio'=>$data['dominio'],
                'dominio'=>'',
                'nombrecliente'=>$data['nombrecliente']
            ]
        );
        $cliente->save();
        $id_user=Crypt::encrypt($insert_id);
        $view=view('emails.confirm_register',['data'=>$data,'id_user'=>$id_user])->render();

        /*Mail::send('emails/confirm_register',$data,function($msj){
            $msj->subject('Kunde - Correo de confirmación');
            $msj->to('ricardo.diez@placeyourfinger.com.mx');
        });*/
        $to      = $data['email'];
        $subject = 'Kunde - Confirmación de registro';
        $message = $view;
        $headers = 'From: info@kunde.com' . "\r\n" .
            'Reply-To: info@kunde.com' . "\r\n" .
            'Content-type:text/html;charset=UTF-8' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        if(mail($to, $subject, $message, $headers)) {
            $respuesta = 'Se ha enviado tu nueva contraseña a tu correo electrónico';
        } else {
            $respuesta = 'Correo electrónico incorrecto, ingrésalo nuevamente';
        }
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

    public function getLockscreen(){
        return view('auth.lockscreen');
    }

    public function getFinalRegisterScreen(){
        return view('auth.register_end');
    }

}   