<?php

namespace App\Repositories;

use App\Repositories\Interfaces\EmpresaRepositoryInterface;
use Illuminate\Support\Collection;

class EmpresaRepository extends AbstractRepository implements EmpresaRepositoryInterface
{
    public function findByEmail(string $data)
    {
        return $this->model::where('email', $data)->first();
    }
}
