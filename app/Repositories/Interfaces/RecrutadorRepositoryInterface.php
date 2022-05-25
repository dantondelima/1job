<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface RecrutadorRepositoryInterface extends RepositoryInterface
{
    public function findByEmail(string $data);

    public function findByEmpresa(int $data);
}
