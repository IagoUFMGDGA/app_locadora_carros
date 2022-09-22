<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
        $credenciais = $request->all(['email', 'password']);
        
        // autenticação (email senha)
        $token = auth('api')->attempt($credenciais); // reuper auth
        
        // retornar um JWT (Json Web Token)
        if($token){
            return response()->json(['token'=>$token], 200);
        }else{
            return response()->json(['erro' => 'usuário ou senha inválido'], 403);
            // 401 = Unauthorized -> não autorizado
            // 403 = forbidden -> proibido (login errado)
        }
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
