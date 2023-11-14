<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anexo extends Model
{
    use HasFactory;
    public $table = "anexos";
    protected $fillable = [
        'anexos',

    ];
    public function registros()
    {
        return $this->hasMany('App\Models\Registros', 'anexo_id', 'id');
    }
}
