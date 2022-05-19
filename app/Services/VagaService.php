<?php

namespace App\Services;

use App\Services\Interfaces\VagaServiceInterface;
use Illuminate\Support\Collection;

class VagaService extends AbstractService implements VagaServiceInterface
{
    public function findByEmpresa(string $data)
    {
        return $this->repository->findByEmpresa($data);
    }
}
