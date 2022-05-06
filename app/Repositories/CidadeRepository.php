<?php

namespace App\Repositories;

use App\Repositories\Interfaces\CidadeRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class CidadeRepository implements CidadeRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function find(int $id): Model
    {
        return $this->model::find($id);
    }

    public function all(): Collection
    {
        return $this->model::all();
    }
}
