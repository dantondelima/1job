<?php

namespace App\Repositories;

use App\Repositories\Interfaces\VagaRepositoryInterface;
use Illuminate\Support\Collection;

class VagaRepository extends AbstractRepository implements VagaRepositoryInterface
{
    public function findByEmpresa(string $data)
    {
        return $this->model::where('email', $data)->first();
    }

    public function findWithRelations(int $data)
    {
        return $this->model::with(['area', 'empresa', 'recrutador'])->where('id', $data)->first();
    }
}
