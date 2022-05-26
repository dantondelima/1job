<?php

namespace App\Services;

use App\Repositories\AbstractRepository;
use App\Services\Interfaces\ServiceInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class AbstractService implements ServiceInterface
{
    protected $repository;

    public function __construct(AbstractRepository $repository)
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

    public function last(): Model|null
    {
        return $this->repository->last();
    }

    public function filterPaginate(string|null $search, array $searchFields, int $limit): mixed
    {
        return $this->repository->filterPaginate($search, $searchFields, $limit);
    }

    public function create(array $data): bool|Model
    {
        return $this->repository->create($data);
    }

    public function update(int $id, array $data): bool
    {
        return $this->repository->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }

}
