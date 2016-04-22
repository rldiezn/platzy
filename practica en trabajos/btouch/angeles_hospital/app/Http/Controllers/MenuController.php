<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MenuController extends Controller
{
    public function index()
    {
        $items = [
            'home'          => ['submenu' => [
                                            'about'     => [],
                                            'company'   => []
                                        ]],
            'about'         => [],
            'contact-us'    => [],
            'login'         => [],
            'register'      => []
        ];
        return view('menu-test', compact('items'));
    }

    public function login()
    {
        $items = [
            'register'          => []
        ];
        return view('menu-test', compact('items'));
    }

    public function register()
    {
        $items = [
            'Ingresar'          => []
        ];
        return view('menu-test', compact('items'));
    }

    public function forgotPassword()
    {
        $items = [
            'Ingresar'          => [],
            'Register'          => []
        ];
        return view('menu-test', compact('items'));
    }
}
