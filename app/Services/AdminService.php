<?php

namespace App\Services;

use App\Services\Interfaces\AdminServiceInterface;
use Illuminate\Support\Collection;

class AdminService extends AbstractService implements AdminServiceInterface
{
    public function allFilter(string|null $search = '', array $searchFields, int $limit): mixed
    {
        return $this->repository->allFilter($search, $searchFields, $limit);
    }
}
