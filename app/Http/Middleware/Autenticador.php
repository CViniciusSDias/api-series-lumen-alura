<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Firebase\JWT\JWT;

class Autenticador
{
    public function handle($request, Closure $next)
    {
        try {
            if (!$request->hasHeader('Authorization')) {
                throw new \BadMethodCallException();
            }

            $token = str_replace('Bearer ', '', $request->header('Authorization'));
            $decodedData = JWT::decode($token, env('JWT_KEY'), ['HS256']);

            $user = User::where(['email' => $decodedData->email])->first();
            if (is_null($user)) {
                throw new \Exception();
            }
            return $next($request);
        } catch (\Exception $e) {
            return response()->json('Unauthorized', 401);
        }
    }
}
