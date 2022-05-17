<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Candidato extends Model
{
    use HasFactory;

    protected $table = 'candidatos';

    protected $fillable = [
        'cpf', 'nome', 'email', 'password', /* 'endereco_id' , 'telefone',*/ 'ativo'
    ];

    protected $hidden = ['password'];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
