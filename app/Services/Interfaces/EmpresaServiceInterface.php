<?php

namespace App\Services\Interfaces;

interface EmpresaServiceInterface extends ServiceInterface
{
    public function gerarToken(array $data);

    public function findByEmail(string $data);

}
