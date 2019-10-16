<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public $timestamps = false;
    protected $table = 'clientes';
    protected $primaryKey = 'cpf';
    protected $fillable = [
        'cpf',
        'nome',
        'status',
        'data_nascimento',
        'cod_telefone',
        'cod_endereco'
    ];
}
