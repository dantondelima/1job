<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface RepositoryInterface
{
    public function find(int $id): Model;

    public function all(): Collection;

    public function filterPaginate(string $search, array $searchFields, int $limit): mixed;

    public function create(array $data): Model;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;

    public function last(): Model|null;
}
