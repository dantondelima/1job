<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtapaProcesso extends Model
{
    use HasFactory;

    protected $table = 'etapas_processos';

    protected $fillable = [
        'vaga_id', 'nome', 'descricao', 'ativa', 'ordem'
    ];

    public function vaga()
    {
        return $this->belongsTo(Vaga::class);
    }
}
