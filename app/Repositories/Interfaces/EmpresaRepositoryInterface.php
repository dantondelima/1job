<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface EmpresaRepositoryInterface extends RepositoryInterface
{
    public function findByEmail(string $data);
}
