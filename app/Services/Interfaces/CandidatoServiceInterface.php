<?php

namespace App\Services\Interfaces;

interface CandidatoServiceInterface extends ServiceInterface
{
    public function gerarToken(array $data);

    public function findByEmail(string $data);

}
