<?php

namespace App\Services\Interfaces;

use Illuminate\Support\Collection;

interface AdminServiceInterface extends ServiceInterface
{
    public function allFilter(string $search, array $searchFields, int $limit): mixed;
}
