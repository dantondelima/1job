<?php

namespace App\Services;

use App\Services\Interfaces\EtapaProcessoServiceInterface;
use App\Utils\ResponseUtil;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Firebase\JWT\JWT;

class EtapaProcessoService extends AbstractService implements EtapaProcessoServiceInterface
{
    public function findByEmail(string $data)
    {
        return $this->repository->findByEmail($data);
    }

    public function findByEmpresa(int $data)
    {
        return $this->repository->findByEmpresa($data);
    }
}
