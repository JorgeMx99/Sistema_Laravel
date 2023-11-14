<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dirigido extends Model
{
    use HasFactory;

    public $table = "dirigidos";
    protected $fillable = [
        'nombre',
        'cargo',
        'dependencia',        
        'unidad',

    ];

    public function registros()
    {
        return $this->hasMany('App\Models\Registros', 'iddirigido', 'id');
    }

}
