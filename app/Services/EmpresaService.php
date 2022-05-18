<?php

namespace App\Services;

use App\Services\Interfaces\EmpresaServiceInterface;
use App\Utils\ResponseUtil;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Firebase\JWT\JWT;

class EmpresaService extends AbstractService implements EmpresaServiceInterface
{
    public function gerarToken(array $data)
    {
        $user = $this->repository->findByEmail($data['email']);
        if(is_null($user) || !Hash::check($data['password'], $user->password)){
            return ResponseUtil::incorrectLogin();
        }
        $token = JWT::encode(
            ['email' => $data['email']],
            env('JWT_KEY_EMPRESA'),
            'HS256'
        );
        return ResponseUtil::successResponse([
            'access_token' => $token
        ]);
    }

    public function findByEmail(string $data)
    {
        return $this->repository->findByEmail($data);
    }

    public function update(int $id, array $data): bool
    {
        return $this->repository->update($id, $data);
    }
}
