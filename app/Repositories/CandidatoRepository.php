<?php

namespace App\Repositories;

use App\Repositories\Interfaces\CandidatoRepositoryInterface;
use Illuminate\Support\Collection;

class CandidatoRepository extends AbstractRepository implements CandidatoRepositoryInterface
{
    public function findByEmail(string $data)
    {
        return $this->model::where('email', $data)->first();
    }
}
