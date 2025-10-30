<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Convidado extends Model
{
    protected $table = 'convidados';

    protected $fillable = [
        'evento_id',
        'nome',
    ];

    public function evento()
    {
        return $this->belongsTo(Evento::class, 'evento_id');
    }
}