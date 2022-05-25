<?php

namespace App\Services\Interfaces;

interface VagaServiceInterface extends ServiceInterface
{
    public function findByEmpresa(string $data);

    public function findWithRelations(int $data);
}
