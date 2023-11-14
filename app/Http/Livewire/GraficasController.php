<?php

namespace App\Http\Livewire;
use App\Models\Registros;
use App\Models\Documento;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;


class GraficasController extends Component
{
    public function render()
    {

    
         
        //@dd($data);


        $registros = Registros::All()->count();
        
        $dependenciadata = Registros::select([
            DB::raw('dependencia as Dependencias'),
            DB::raw('COUNT(*) as total')
        ])
        ->groupby('Dependencias')
        ->orderby('Dependencias','desc')
        ->get();


        foreach($dependenciadata as $dd){
            $Dependencias[] = $dd->Dependencias;
            $total[] = $dd->total;        
        }
        


        if (!empty($Dependencias)) { // <= false
           
            $dependencianombre = implode( "','"  , $Dependencias);
        
        } else {
        
            $dependencianombre = 'SIN DATOS';
        }

        if (!empty($total)) { // <= false

            $dependenciatotal = implode(',', $total);
        
        } else {
           
            $dependenciatotal = 0;
        }
    
      
       



        $docdata = Registros::select([
            DB::raw('documentos.tipo as Documento'),
            DB::raw('COUNT(*) as Total')            
        ])
        ->join('documentos','registros.idtipodocumento', '=', 'documentos.id')
        ->groupby('Documento')
        ->get();


        foreach($docdata as $dd){
            $Documento[] = $dd->Documento;
            $totaldoc[] = $dd->Total;        
        }
        

        if (!empty($Documento)) { // <= false
            //$docuname = 0;
            $docuname = implode( "','"  , $Documento);
        
        } else {
            $docuname = 'SIN DATOS';
            //$docuname = implode( "','"  , $Documento);
        }

        if (!empty($totaldoc)) { // <= false
            $docutotal = implode(',', $totaldoc);
           // $docutotal = 0;
        
        } else {
        
            $docutotal = 0;
           // $docutotal = implode(',', $totaldoc);
        }

        


        DB::statement("SET lc_time_names = 'es_MX'");
        $registrosdata = Registros::select([
            DB::raw('MonthName(fecha_recepcion) as mes'),
            DB::raw('COUNT(*) as total')
        ])
        ->groupby('mes')
        ->orderby('fecha_recepcion','ASC')
        ->get();


        foreach($registrosdata as $rd){
            $mes[] = $rd->mes;
            $totalmes[] = $rd->total;
            
        }

  
        if (!empty($mes)) { // <= false
            $registrosmes = implode( "','" , $mes);
            //$registrosmes =0;
        
        } else {

            $registrosmes ='SIN DATOS';
            //$registrosmes = implode( "','" , $mes);
        }



        if (!empty($totalmes)) { // <= false
            $registrostotal = implode(',', $totalmes);
            //$registrostotal =0;
        
        } else {
            $registrostotal = 0;
            //$registrostotal = implode(',', $totalmes);
        }


        

        $registroslabel = 'Correspondencia Recibida';
  
       

    
        return view('livewire.graficos.component',[
            
         

            'docuname' => $docuname,
            'docutotal' => $docutotal,


            'registroslabel' => $registroslabel,
            'registrosmes' => $registrosmes,
            'registrostotal' => $registrostotal,
            
            'dependencianombre'=>$dependencianombre,
            'dependenciatotal'=>$dependenciatotal,
            
        
        ]);
    

   

    
    }
}
