<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recrutador extends Model
{
    use HasFactory;

    protected $table = 'recrutadores';

    protected $fillable = [
        'nome', 'email', 'cpf', 'password', 'ativo', 'empresa_id', 'confirmado'
    ];
}
