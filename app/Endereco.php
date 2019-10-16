<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    public $timestamps = false;
    protected $table = 'enderecos';
    protected $primaryKey = 'codigo';
    protected $fillable = [
        'cep',
        'logradouro',
        'bairro',
        'cidade',
        'estado'
    ];
}
