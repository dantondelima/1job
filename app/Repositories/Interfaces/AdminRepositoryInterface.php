<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface AdminRepositoryInterface extends RepositoryInterface
{
    public function allFilter(string $search, array $searchFields, int $limit): mixed;
}
