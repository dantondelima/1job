<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface EstadoRepositoryInterface
{
    public function all(): Collection;
}
