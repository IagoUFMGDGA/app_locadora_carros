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
        auth('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
    public function refresh(){
        // para o refresh é necessário informar o driver (no caso api)
        $token = auth('api')->refresh(); // necessário encaminhar um jwt válido
        return response()->json(['token'=>$token]);
    }
    public function me(){
        return response()->json(auth()->user());
    }
}
