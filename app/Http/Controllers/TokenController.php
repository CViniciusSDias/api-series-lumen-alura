<?php

namespace App\Http\Controllers;

use App\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TokenController extends Controller
{
    public function generateToken(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'senha' => 'required'
        ]);

        $dadosLogin = $request->only('email', 'senha');
        $user = User::where(['email' => $dadosLogin['email']])->first();
        if (is_null($user) || !Hash::check($dadosLogin['senha'], $user->senha)) {
            return response()->json([
                'mensagem' => 'Usuário ou senha inválidos'
            ], 401);
        }


        $token = JWT::encode(['email' => $dadosLogin['email']], env('JWT_KEY'));

        return [
            'access_token' => $token
        ];
    }
}
