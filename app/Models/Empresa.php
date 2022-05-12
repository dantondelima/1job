<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'empresas';

    protected $fillable = [
        'cnpj', 'razao_social', 'nome_fantasia', 'email', 'password', /* 'endereco_id' , 'telefone',*/ 'ativo'
    ];
}
