<?php

namespace App\Services;

use App\Repositories\CidadeRepository;
use App\Services\Interfaces\CidadeServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CidadeService implements CidadeServiceInterface
{
    public function __construct(CidadeRepository $repository)
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
