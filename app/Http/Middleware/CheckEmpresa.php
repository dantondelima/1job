<?php

namespace App\Http\Middleware;

use App\Models\Empresa;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;

class CheckEmpresa
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, \Closure $next)
    {
        try {
            if (!$request->hasHeader('Authorization')) {
                throw new \Exception();
            }
            $authorizationHeader = $request->header('Authorization');
            $token = str_replace('Bearer ', '', $authorizationHeader);

            $dadosAutenticacao = JWT::decode($token, new Key(env('JWT_KEY_EMPRESA'), 'HS256'));
            $user = Empresa::where('email', $dadosAutenticacao->email)->first();
            if(is_null($user)){
                throw new \Exception();
            }
            return $next($request);
        }catch (\Exception $ex){
            return response()->json('Unauthorized', 401);
        }
    }
}
