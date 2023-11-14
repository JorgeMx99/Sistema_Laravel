<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Documento;
use Livewire\WithPagination;

class DocumentosController extends Component
{

    use WithPagination;
    public $tipo;
    public $selected_id;
    public $search;
    public $action = 1, $pagination = 5;

    public function render()
    {

        if (strlen($this->search) > 0) {
            $documento = Documento::where('tipo', 'like', '%' . $this->search . '%')
                ->paginate($this->pagination);
            return view('livewire.tipodocumentos.component', ['documento' => $documento]);
        } else {

            $documento = Documento::orderBy('id', 'asc')
                ->paginate($this->pagination);
            return view('livewire.tipodocumentos.component', [
                'documento' => $documento,
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
        $this->tipo = '';
        $this->selected_id = null;
        $this->action = 1;
        $this->search = '';
        $this->resetValidation();
        //$this->jerarquia =null;
    }

      //buscamos el registro seleccionado y asignamos la info a las propiedades
      public function edit($id)
      {
          $record = Documento::findOrFail($id);
          $this->selected_id = $id;
          $this->tipo = $record->tipo;
          $this->action = 2;
      }
    //método para registrar y/o actualizar registros
    public function StoreOrUpdate()
    {

        $this->validate([
            
            'tipo' => 'required',
        ]);


        if ($this->selected_id <= 0) {


            $documentos =  Documento::create([
                'tipo' => $this->tipo,

            ]);
        } else {

            $documentos = Documento::find($this->selected_id);
            $documentos->update([
                'tipo' => $this->tipo,

                
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
            $record = Documento::where('id', $id);
            $record->delete();
            $this->resetInput();
        }
    }




















}
