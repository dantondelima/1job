<?php

namespace App\Repositories;

use App\Repositories\Interfaces\RecrutadorRepositoryInterface;
use Illuminate\Support\Collection;

class RecrutadorRepository extends AbstractRepository implements RecrutadorRepositoryInterface
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
