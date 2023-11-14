<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registros extends Model
{
    use HasFactory;

    protected $fillable = [
       
        'fecha_recepcion',
        'hora_recepcion',
        'idtipodocumento',
        'num_documento',
        'dependencia',
        'signado',
        'cargo',
        'asunto',
        'iddirigido',
        'anexo_id',
        'seguimiento',
        'resguardo',
        'hipervinculo',
        'nombre_expediente',
        'seccion',
        'ubicacion_fisica',
        'observaciones',
        'status'

    ];

    public function documento()
    {
        return $this->hasOne('App\Models\Documento', 'id', 'idtipodocumento');
    }
    
    public function anexo()
    {
        return $this->hasOne('App\Models\Anexo', 'id', 'anexo_id');
    }

   
    public function dirigido()
    {
        return $this->hasOne('App\Models\Dirigido', 'id', 'iddirigido');
    }
}
