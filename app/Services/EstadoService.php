<?php

namespace App\Services;

use App\Repositories\EstadoRepository;
use App\Services\Interfaces\EstadoServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EstadoService implements EstadoServiceInterface
{
    public function __construct(EstadoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function find(int $id): Model
    {
        return $this->repository->find($id);
    }

    public function all(): Collection
    {
        return $this->repository->all();
    }
}
