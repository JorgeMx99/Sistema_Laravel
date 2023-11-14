<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Dirigido;
use Livewire\WithPagination;

class DirigidosController extends Component
{

    use WithPagination;
    public $nombre,$cargo, $dependencia,$unidad;
    public $selected_id;
    public $search;
    public $action = 1, $pagination = 5;

    public function render()
    {

        if (strlen($this->search) > 0) {
            $dirigido = Dirigido::where('nombre', 'like', '%' . $this->search . '%')
                ->paginate($this->pagination);
            return view('livewire.dirigidos.component', ['dirigido' => $dirigido]);
        } else {

            $dirigido = Dirigido::orderBy('id', 'asc')
                ->paginate($this->pagination);
            return view('livewire.dirigidos.component', [
                'dirigido' => $dirigido,
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
        $this->nombre = '';
        $this->cargo = '';
        $this->dependencia = '';
        $this->unidad = '';
        $this->selected_id = null;
        $this->action = 1;
        $this->search = '';
        $this->resetValidation();
        
    }

      //buscamos el registro seleccionado y asignamos la info a las propiedades
      public function edit($id)
      {
          $record = Dirigido::findOrFail($id);
          $this->selected_id = $id;
          $this->nombre = $record->nombre;
          $this->cargo = $record->cargo;
          $this->dependencia = $record->dependencia;
          $this->unidad = $record->unidad;
          $this->action = 2;
      }
    //método para registrar y/o actualizar registros
    public function StoreOrUpdate()
    {

        $this->validate([
            
            'nombre' => 'required',
            'cargo' => 'required',
            'dependencia' => 'required',
            'unidad' => 'required',
        ]);


        if ($this->selected_id <= 0) {


            $dirigidos =  Dirigido::create([
                'nombre' => $this->nombre,
                'cargo' => $this->cargo,
                'dependencia' => $this->dependencia,
                'unidad' => $this->unidad,


            ]);
        } else {

            $dirigidos = Dirigido::find($this->selected_id);
            $dirigidos->update([
                'nombre' => $this->nombre,
                'cargo' => $this->cargo,
                'dependencia' => $this->dependencia,
                'unidad' => $this->unidad,

                
            ]);
        }


        if ($this->selected_id)
        toastr()->success('Registro Actualizado Correctamente');


        else
        toastr()->success('Registros Creado Correctamente');




        $this->resetInput();
    }
   //escuchar eventos y ejecutar acción solicitada
    protected $listeners = [
        'deleteRow'     => 'destroy'
    ];


    //método para eliminar un registro dado
    public function destroy($id)
    {
        if ($id) {
            $record = Dirigido::where('id', $id);
            $record->delete();
            $this->resetInput();
        }
    }
}