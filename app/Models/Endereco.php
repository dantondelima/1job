<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $table = 'cidades';

    protected $fillable = [
        'cep', 'estado_id', 'cidade_id', 'bairro', 'endereco', 'numero', 'complemento'
    ];
}
