<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtapasInscricao extends Model
{
    use HasFactory;

    protected $table = 'etapas_inscricoes';

    protected $fillable = [
        'inscricao_id', 'etapa_id', 'concluida', 'aprovada', 'reprovada'
    ];

    public function vaga()
    {
        return $this->belongsTo(Vaga::class);
    }
}
