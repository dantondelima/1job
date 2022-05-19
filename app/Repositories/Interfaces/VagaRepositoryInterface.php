<?php

namespace App\Repositories\Interfaces;

interface VagaRepositoryInterface extends RepositoryInterface
{
    public function findByEmpresa(string $data);
}
