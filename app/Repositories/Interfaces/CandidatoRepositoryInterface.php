<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface CandidatoRepositoryInterface extends RepositoryInterface
{
    public function findByEmail(string $data);
}
