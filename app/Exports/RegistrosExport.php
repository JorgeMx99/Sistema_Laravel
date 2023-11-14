<?php

namespace App\Exports;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;


class RegistrosExport implements FromQuery, WithHeadings, WithEvents, ShouldAutoSize
{
 use Exportable;






    public function query()
    {
        return DB::table('registros') 
       
        ->select('registros.id',
        'registros.fecha_recepcion',
        'registros.hora_recepcion',
        'documentos.tipo',
        'registros.num_documento',
        'registros.dependencia',
        'registros.signado',
        'registros.cargo',
        'registros.asunto',
        'dirigidos.nombre',
        'anexos.anexos',
        'registros.seguimiento',
        'registros.resguardo',
        'registros.hipervinculo',
        'registros.nombre_expediente',
        'registros.seccion',
        'registros.ubicacion_fisica',
        'registros.observaciones')
        ->join('dirigidos', 'registros.iddirigido', '=', 'dirigidos.id')
        ->join('anexos', 'registros.anexo_id', '=', 'anexos.id')
        ->join('documentos', 'registros.idtipodocumento', '=', 'documentos.id')
        ->orderBy('registros.id','asc');

    }

    public function headings():array{
        return[
            "FOLIO","FECHA DE RECEPCIÓN","HORA DE RECEPCIÓN","TIPO DE DOCUMENTO",
            "NÚMERO DE DOCUMENTO", "DEPENDENCIA","SIGNADO","CARGO ","ASUNTO","DIRIGIDO",
            "ANEXOS","SEGUIMIENTO","RESGUARDO","HIPERVINCULO","NOMBRE DEL EXPEDIENTE","SECCIÓN",
            "UBICACIÓN FÍSICA","OBSERVACIONES",

        ];
    }


    public function registerEvents(): array

    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
  
                $event->sheet->getDelegate()->getStyle('A1:R1')
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('A50021');

                $event->sheet->getDelegate()->getStyle('A1:R1')
                        ->getFont()
                        ->getColor()
                        ->setARGB('FFFFFF');

                $event->sheet->getDelegate()->getStyle('A1:R1')
                        ->getFont()
                        ->setSize(12);

                $event->sheet->getDelegate()->getStyle('A1:R1')
                        ->getFont()
                        ->setBold(true);

                $event->sheet->getDelegate()->getStyle(1)
                        ->getFont()
                        ->setName('Frutiger 45 LIGHT');       
                             
            },    

               
                             
                   
        ];

    }

    
       


    
    
}