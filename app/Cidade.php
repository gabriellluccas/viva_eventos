<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    public $timestamps = false;
    protected $table = 'cidades';
    protected $primaryKey = 'codigo';
}
