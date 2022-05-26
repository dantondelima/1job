<?php

namespace App\Services\Interfaces;

interface EtapaProcessoServiceInterface extends ServiceInterface
{
    public function findByEmail(string $data);

    public function findByEmpresa(int $data);
}
