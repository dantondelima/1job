<?php

namespace App\Services\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface EstadoServiceInterface
{
    public function find(int $id): Model;

    public function all(): Collection;
}
