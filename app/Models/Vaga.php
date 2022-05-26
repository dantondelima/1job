<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
    use HasFactory;

    protected $table = 'vagas';

    protected $fillable = [
        'titulo', 'regime_contratual', 'quantidade', 'remuneracao', 'modalidade',
        'descricao', 'empresa_id', 'recrutador_id', 'area_id', 'ativa', 'encerrada'
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function recrutador()
    {
        return $this->belongsTo(Recrutador::class);
    }

    public function etapas()
    {
        return $this->hasMany(EtapaProcesso::class);
    }
}
