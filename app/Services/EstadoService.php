<?php

namespace App\Services;

use App\Services\Interfaces\EstadoServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EstadoService implements EstadoServiceInterface
{
    public function find(int $id): Model
    {
        return $this->repository->find($id);
    }

    public function all(): Collection
    {
        return $this->repository->all();
    }
}
