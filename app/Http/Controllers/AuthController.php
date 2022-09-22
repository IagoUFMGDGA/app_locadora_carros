<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return 'loging';
    }
    public function logout(){
        return 'logout';
    }
    public function refresh(){
        return 'reflesh';
    }
    public function me(){
        return 'me';
    }
}
