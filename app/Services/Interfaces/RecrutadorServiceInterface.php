<?php

namespace App\Services\Interfaces;

interface RecrutadorServiceInterface extends ServiceInterface
{
    public function gerarToken(array $data);

    public function findByEmail(string $data);

    public function findByEmpresa(int $data);
}
