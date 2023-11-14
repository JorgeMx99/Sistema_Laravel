<?php

namespace App\Http\Livewire;
use App\Models\Registros;
use App\Models\Documento;
use App\Models\Anexo;
use App\Models\Dirigido;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\RegistrosExport;
use Excel;
use PDF;
class RegistrosController extends Component
{
    use WithPagination;
    public  $fecha_recepcion, $hora_recepcion, $num_documento ,
    $dependencia, $signado, $cargo, $asunto, $dirigido ='Elegir', $anexo ='Elegir', $seguimiento,
    $resguardo, $hipervinculo, $nombre_expediente, $seccion,$tipodocumento ='Elegir' ,
    $ubicacion_fisica, $observaciones, $status = 'Elegir',$status1 = 'Recepción',$status2 = 'Archivo sin Respuesta', $status3 = 'Archivo con Respuesta';
    public $selected_id;
    public $search;
    public $filtro;
    public $dependencias;
    public $searchdate;

    public $action = 1, $pagination = 7;
    public $tipodocumentos;
    public $anexos;
    public $dirigidos;




    public function paginationView()
    {
        return 'vendor.pagination.tailwind';
    }

    public function render()
    {
        $this->tipodocumentos = Documento::all();
        $this->anexos = Anexo::all();
        $this->dirigidos = Dirigido::all();
        
        if (strlen($this->search) > 0) {
            $info = Registros::where('id', 'like', '%' . $this->search . '%')
                ->paginate($this->pagination);
            return view('livewire.registros.component', ['info' =>  $info]);
        } 

        if (strlen($this->searchdate) > 0) {
            $info = Registros::where('fecha_recepcion', 'like', '%' . $this->searchdate . '%')
                ->paginate($this->pagination);
            return view('livewire.registros.component', ['info' => $info]);
        } 

        if (strlen($this->filtro) > 0) {
            $info = Registros::where('status', 'like', '%' . $this->filtro . '%')
                ->paginate($this->pagination);
            return view('livewire.registros.component', ['info' => $info]);
        } 

       
           
        else {
            $info = Registros::All();

            $info = Registros::orderBy('id', 'asc')
                ->paginate($this->pagination);
            return view('livewire.registros.component', [
                'info' => $info,
            ]);
        }
    }

    //permite la búsqueda cuando se navega entre el paginado
    public function updatingSearch()
    {
        $this->gotoPage(1);
    }

    //activa la vista edición o creación
    public function doAction($action)
    {
        $this->resetInput();
        $this->action = $action;
    }

    //método para reiniciar variables
    private function resetInput()
    {
        $this->id = '';
    
        $this->fecha_recepcion = '';
        $this->hora_recepcion = '';
        $this->tipodocumento = 'Elegir';
        $this->num_documento = '';
        $this->dependencia = '';
        $this->signado = '';
        $this->cargo = '';
        $this->asunto = '';
        $this->dirigido = 'Elegir';
        $this->anexo = '1';
        $this->seguimiento = '';
        $this->resguardo = '';
        $this->hipervinculo = '';
        $this->nombre_expediente = '';
        $this->seccion = '';
        $this->status = 'Elegir';
        $this->ubicacion_fisica = '';
        $this->observaciones = '';
        $this->selected_id = null;
        $this->action = 1;
        $this->search = '';
        $this->searchdate= '';
        $this->resetValidation();
        //$this->jerarquia =null;
    }


    //buscamos el registro seleccionado y asignamos la info a las propiedades
    public function edit($id)
    {
        $record = Registros::findOrFail($id);
        $this->selected_id = $id;
        $this->fecha_recepcion = $record->fecha_recepcion;
        $this->hora_recepcion = $record->hora_recepcion;
        $this->tipodocumento = $record->documento->id;
        $this->num_documento = $record->num_documento;
        $this->dependencia = $record->dependencia;
        $this->signado = $record->signado;
        $this->cargo = $record->cargo;
        $this->asunto = $record->asunto;
        $this->dirigido = $record->dirigido->id;
        $this->anexo = $record->anexo->id;
        $this->seguimiento = $record->seguimiento;
        $this->resguardo = $record->resguardo;
        $this->hipervinculo = $record->hipervinculo;
        $this->nombre_expediente = $record->nombre_expediente;
        $this->seccion = $record->seccion;
        $this->status = $record->status;
        $this->ubicacion_fisica = $record->ubicacion_fisica;
        $this->observaciones = $record->observaciones;
        $this->action = 2;

    }



    //método para registrar y/o actualizar registros
    public function StoreOrUpdate()
    {



        $rules =[

            'fecha_recepcion' => 'required',
            'hora_recepcion'  => 'required',
            'tipodocumento' => 'required|not_in:Elegir',
            'dependencia' => 'required',
            'signado' => 'required',
            'num_documento' => 'required',
            'cargo' => 'required',
            'asunto' => 'required',
            'dirigido' => 'required|not_in:Elegir',

        ];


        
        $messages =[
            'fecha_recepcion.required' => 'Ingresa la Fecha de Recepción',
            'hora_recepcion'  => 'Ingresa la Hora de Recepción',
            'tipodocumento' => 'Selecciona el Tipo de Documento',
            'dependencia' => 'Ingresa una Dependencia',
            'signado' => 'Ingrese el nombre del Remitente',
            'num_documento' => 'Ingresa el No. de Documento',
            'cargo' => 'Ingresa el cargo del Remitente',
            'asunto' => 'Ingresa el Asunto',
            'dirigido' => 'Selecciona a quien va Dirigido',
        ];

        $this->validate($rules, $messages);

       /* $this->validate
       ([
            
           
            'fecha_recepcion' => 'required',
            'hora_recepcion'  => 'required',
            'tipodocumento' => 'required',
            'dependencia' => 'required',
            'signado' => 'required',
            'num_documento' => 'required',
            'cargo' => 'required',
            'asunto' => 'required',
            'dirigido' => 'required',

       
            'seguimiento' => '',
            'resguardo' => '',
            'hipervinculo' => '',
            'nombre_expediente' => '',
            'seccion' => '',
            'ubicacion_fisica' => '',
            'observaciones' => '',


            'tipodocumento'   => 'not_in:Elegir',
            'dirigido'   => 'not_in:Elegir',
           

        ]);*/


        if ($this->selected_id <= 0) {


            $registros =  Registros::create([
              
                'fecha_recepcion' =>$this->fecha_recepcion,
                'hora_recepcion' => $this->hora_recepcion, 
                'idtipodocumento' =>$this->tipodocumento, 
                'dependencia' => $this->dependencia, 
                'signado' => $this->signado,
                'num_documento' =>$this->num_documento,
                'cargo' => $this->cargo,
                'asunto' =>$this->asunto ,
                'iddirigido' => $this->dirigido ,
                'anexo_id' => $this->anexo ,
                'seguimiento' => $this->seguimiento ,
                'resguardo' => $this->resguardo ,
                'hipervinculo' => $this->hipervinculo ,
                'nombre_expediente' => $this->nombre_expediente ,
                'seccion' => $this->seccion ,
                'status' => $this->status1 ,
                'ubicacion_fisica' => $this->ubicacion_fisica ,
                'observaciones' => $this->observaciones 
                


            ]);
        } else {

            $registros = Registros::find($this->selected_id);
            $registros->update([
               
                'fecha_recepcion' =>$this->fecha_recepcion,
                'hora_recepcion' => $this->hora_recepcion, 
                'idtipodocumento' =>$this->tipodocumento, 
                'dependencia' => $this->dependencia, 
                'signado' => $this->signado,
                'num_documento' =>$this->num_documento,
                'cargo' => $this->cargo,
                'asunto' =>$this->asunto ,
                'iddirigido' => $this->dirigido ,
                'anexo_id' => $this->anexo ,
                'seguimiento' => $this->seguimiento ,
                'resguardo' => $this->resguardo ,
                'hipervinculo' => $this->hipervinculo ,
                'nombre_expediente' => $this->nombre_expediente ,
                'seccion' => $this->seccion ,
                'ubicacion_fisica' => $this->ubicacion_fisica ,
                'observaciones' => $this->observaciones 
                
            ]);

            if ($this->observaciones != null){
            //si el campo password (del form) trae algo lo actualiza 
            $registros->update([
                'status' => $this->status3 ,
            ]);
            }   
            else{
            $registros->update([
                'status' => $this->status1 ,
            ]);

            }


        }


        if ($this->selected_id)
        toastr()->success('Registro Actualizado Correctamente');


        else
        toastr()->success('Registros Creado Correctamente');




        $this->resetInput();
    }


    public function Update()
    {

        $this->validate([
            
            
            'seguimiento' => '',
            'resguardo' => '',
            'hipervinculo' => '',
            'nombre_expediente' => '',
            'seccion' => '',
            'ubicacion_fisica' => '',
            'observaciones' => '',


        ]);


            $registros = Registros::find($this->selected_id);
            $registros->update([      
                'anexo_id' => $this->anexo ,
                'seguimiento' => $this->seguimiento ,
                'resguardo' => $this->resguardo ,
                'hipervinculo' => $this->hipervinculo ,
                'nombre_expediente' => $this->nombre_expediente ,
                'seccion' => $this->seccion ,
                'status' => $this->status2 ,
                'ubicacion_fisica' => $this->ubicacion_fisica ,
                'observaciones' => $this->observaciones 
                
            ]);

            if ($this->observaciones != null)
                //si el campo password (del form) trae algo lo actualiza 
                $registros->update([
                    'status' => $this->status3 ,
                ]);
        


        if ($this->selected_id)
        toastr()->success('Registro Actualizado Correctamente');

        $this->resetInput();
    }


    //escuchar eventos y ejecutar acción solicitada
    protected $listeners = [
        'deleteRow'     => 'destroy',
    ];


    //método para eliminar un registro dado
    public function destroy($id)
    {
        if ($id) {
            $record = Registros::where('id', $id);
            $record->delete();
            $this->resetInput();
        }
    }

    public function export() 
    {
        return Excel::download(new RegistrosExport,'Reporte.xlsx');

    }


    public function pdf(){

        $registros = Registros::all();

        $pdf = PDF::LoadView('livewire.registros.pdf', ['registros' => $registros]);
        return $pdf->setpaper('A3','landscape')->stream('reporte.pdf');

    }

}