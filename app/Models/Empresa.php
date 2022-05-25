<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'empresas';

    protected $fillable = [
        'cnpj', 'razao_social', 'nome_fantasia', 'email', 'password', /* 'endereco_id' , 'telefone',*/ 'ativo'
    ];

    protected $hidden = ['password'];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function vagas()
    {
        return $this->hasMany(Vaga::class);
    }

    public function recrutadores()
    {
        return $this->hasMany(Recrutador::class);
    }

}
