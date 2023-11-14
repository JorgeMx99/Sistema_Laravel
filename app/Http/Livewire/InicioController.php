<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Registros;
use App\Models\Documento;
use Spatie\Permission\Models\Role;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class InicioController extends Component
{



        public function render()
        {
 



            $status1 = Registros::select([
                DB::raw('status')
                ])
                ->where('status', '=', "RECEPCIÓN")
                ->GET();

                $status2 = Registros::select([
                    DB::raw('status')
                    ])
                    ->where('status', '=', "ARCHIVO CON RESPUESTA")
                    ->GET();

                    $status3 = Registros::select([
                        DB::raw('status')
                        ])
                        ->where('status', '=', "ARCHIVO SIN RESPUESTA")
                        ->GET();


             
    



         
                $totalregistros = Registros::All();
                $totalusuarios = User::All();
                $totalroles= Role::all();


                    return view('livewire.dashboard.dash', [
                    'totalregistros' => $totalregistros,
                    'totalusuarios' => $totalusuarios,
                    'totalroles' => $totalroles,
                    'status1'=>$status1,
                    'status2'=>$status2,
                    'status3'=>$status3

                ]);
        }
        
    }

