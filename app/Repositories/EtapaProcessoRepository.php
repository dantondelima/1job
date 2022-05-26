<?php

namespace App\Repositories;

use App\Repositories\Interfaces\EtapaProcessoRepositoryInterface;
use Illuminate\Support\Collection;

class EtapaProcessoRepository extends AbstractRepository implements EtapaProcessoRepositoryInterface
{
    public function findByEmail(string $data)
    {
        return $this->model::where('email', $data)->first();
    }

    public function findByEmpresa(int $data)
    {
        return $this->model::select('id', 'nome')->where('empresa_id', $data)->get();
    }
}
