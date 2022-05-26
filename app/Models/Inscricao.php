<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
    use HasFactory;

    protected $table = 'inscricoes';

    protected $fillable = [
        'vaga_id', 'candidato_id', 'ativa', 'cancelada', 'encerrada', 'aprovada', 'reprovada'
    ];

    public function vaga()
    {
        return $this->belongsTo(Vaga::class);
    }

    public function candidato()
    {
        return $this->belongsTo(Candidato::class);
    }
}
