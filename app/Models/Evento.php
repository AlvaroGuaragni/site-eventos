<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = "eventos";


    protected $fillable = [
        'tipo',
        'qtdPessoas',
        'data',
        'local_id',
        'cliente_id',

    ];

  
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }


    public function local()
    {
        return $this->belongsTo(Local::class, 'local_id');
    }

    public function convidados()
    {
        return $this->hasMany(Convidado::class, 'evento_id');
    }
}