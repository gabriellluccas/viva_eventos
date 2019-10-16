<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    public $timestamps = false;
    protected $table = 'telefones';
    protected $primaryKey = 'codigo';
    protected $fillable = [
        'telefone',
        'tipo'
    ];
}
