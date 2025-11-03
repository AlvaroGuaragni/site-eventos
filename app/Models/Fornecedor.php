<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $table = 'fornecedores';

    protected $fillable = [
        'nome',
        'telefone',
        'email',
        'cnpj',
        'logo_path',
    ];

    public function servicos()
    {
        return $this->hasMany(Servico::class, 'fornecedor_id');
    }
}


