<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface CidadeRepositoryInterface
{
    public function all(): Collection;
}
