<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model

{
    use HasFactory;
    
  


    protected $fillable = [
        'tipo',

    ];
    public function registros()
    {
        return $this->hasMany('App\Models\Registros', 'idtipodocumento', 'id');
    }
}
