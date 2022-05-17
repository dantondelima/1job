<?php

namespace App\Services;

use App\Services\Interfaces\CandidatoServiceInterface;
use App\Utils\ResponseUtil;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Firebase\JWT\JWT;

class CandidatoService extends AbstractService implements CandidatoServiceInterface
{
    public function gerarToken(array $data)
    {
        $user = $this->repository->findByEmail($data['email']);
        if(is_null($user) || !Hash::check($data['password'], $user->password)){
            return ResponseUtil::notAuthorizedResponse();
        }
        $token = JWT::encode(
            ['email' => $data['email']],
            env('JWT_KEY_CANDIDATO'),
            'HS256'
        );
        return [
            'access_token' => $token
        ];
    }

    public function findByEmail(string $data)
    {
        return $this->repository->findByEmail($data);
    }
}
