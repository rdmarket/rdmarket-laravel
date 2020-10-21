<?php

namespace App\Http\Middleware;

use App\Usuario;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;

class Autenticador
{
    public function handle(Request $request, \Closure $next)
    {
        try {
            if (!$request->hasHeader('Authorization')) {
                throw new \Exception();
                return response()->json('aqui',200);
            }

            $authorizationHeader = $request->header('Authorization');
            $token = str_replace('Bearer ', '', $authorizationHeader);
            $dadosAutenticacao = JWT::decode($token, env('JWT_KEY'), ['HS256']);

            $usuario = Usuario::where('CPF', $dadosAutenticacao->CPF)->first();

            if (is_null($usuario)) {
                throw new \Exception();
                return response()->json('aqui',200);
            }

            return $next($request);

        } catch (\Exception $e) {
            return response()->json('Não autorizado', 401);
        }

    }
}