<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
    use HasFactory;

    protected $table = 'vagas';

    protected $fillable = [
        'titulo', 'regime_contratual', 'quantidade', 'remuneracao', 'modalidade', 'descricao', 'empresa_id', 'recrutador_id'
    ];
}
