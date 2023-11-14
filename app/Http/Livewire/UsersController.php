<?php

namespace App\Http\Livewire;
use Illuminate\Validation\Rule;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
class UsersController extends Component
{
    use WithPagination;
    public $tipo = 'Elegir', $name, $celular, $area, $email, $num_isset, $password;
    public $selected_id;
    public $search;
    public $action = 1, $pagination = 10;

    public function render()
    {


      
           


        if (strlen($this->search) > 0) {
            $info = user::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('tipo', 'like', '%' . $this->search . '%')
                ->paginate($this->pagination);
            return view('livewire.usuarios.component', ['info' => $info]);
        }
        
       
        
        else {



            $info = User::All();

            $info = User::orderBy('id', 'desc')
                ->paginate($this->pagination);
                
            return view('livewire.usuarios.component', [
                'info' => $info,
                'roles' =>Role::orderBy('name','asc')->get()
               
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
        $this->name = '';
        $this->tipo = 'Elegir';
        $this->celular = '';
        $this->email = '';
        $this->area = '';
        $this->num_isset = '';
        $this->password = '';
        $this->selected_id = null;
        $this->action = 1;
        $this->search = '';
        $this->resetValidation();
        $this->resetpage();
        //$this->jerarquia =null;
    }


    //buscamos el registro seleccionado y asignamos la info a las propiedades
    public function edit($id)
    {
        $record = User::findOrFail($id);
        $this->selected_id = $id;
        $this->name = $record->name;
        $this->celular = $record->celular;
        $this->area = $record->area;
        $this->email = $record->email;
        $this->num_isset = $record->num_isset;
        $this->tipo = $record->tipo;
        $this->action = 2;
    }

    public function show($id)
    {
        $record = User::findOrFail($id);
        $this->selected_id = $id;
        $this->name = $record->name;
        $this->celular = $record->celular;
        $this->area = $record->area;
        $this->email = $record->email;
        $this->num_isset = $record->num_isset;
        $this->tipo = $record->tipo;
        $this->action = 3;
    }

    //método para registrar y/o actualizar registros
    public function StoreOrUpdate(User $user): void
    {
      
        if ($this->selected_id <= 0) {
            $rules =[

                'name' => 'required',
                'area' => 'required',
                'tipo' => 'required|not_in:Elegir',
                'num_isset' => 'required',
                'password' => 'required|min:8',
                'celular' => 'required|min:10',
                'email' => 'required|unique:users|email',
    
              
    
            ];
    
    
            
            $messages =[
                'name.required' => 'Ingresa el Nombre ',
                'area.required' => 'Ingresa el Área ',
                'tipo.required' => 'Selecciona el Rol del usuario',
                'tipo.not_in' => 'Seleccione un Rol válido',
                'num_isset.required' => 'Ingresa el No. del ISSET',
                'password.required' => 'Ingrese la contraseña',
                'password.min' => 'La contraseña debe tener al menos 8 caracteres',
                'celular.min' => 'Ingrese un número valido',
                'celular.required' => 'Ingresa el numero de Celular ',
                'email.required' => 'Ingresa el correo',
                'email.unique' => 'El correo ya existe en el sistema',
                'email.email' => 'Ingrese un correo válido',
    
                
                
            
            ];

            $this->validate($rules, $messages);

            $user =  User::create([
                'name' => $this->name,
                'celular' => $this->celular,
                'area' => $this->area,
                'tipo' => $this->tipo,
                'email' => $this->email,
                'num_isset' => $this->num_isset,
                'password' => bcrypt($this->password)
            ]);


            $user->syncRoles($this->tipo);
        } else {

            $rules =[

                'email' => "required|email|unique:users,email,{$this->selected_id}",
                'name' => 'required',
                'tipo' => 'required|not_in:Elegir',
                'num_isset' => 'required',
                'password' => 'min:8',
                'celular' => 'required|min:10',
   
    
            ];
    
    
            
            $messages =[
                'name.required' => 'Ingresa el Nombre ',
                'tipo.required' => 'Selecciona el Rol del usuario',
                'tipo.not_in' => 'Seleccione un Rol válido',
                'num_isset.required' => 'Ingresa el No. del ISSET',
                'password.min' => 'La contraseña debe tener al menos 8 caracteres',
                'celular.min' => 'Ingrese un número valido',
                'celular.required' => 'Ingresa el numero de Celular ',
                'email.required' => 'Ingresa el correo',
                'email.unique' => 'El correo ya existe en el sistema',
                'email.email' => 'Ingrese un correo válido',
    
                
                
            
            ];



            
            $this->validate($rules, $messages);

            $user = User::find($this->selected_id);
            $user->update([
                'name' => $this->name,
                'celular' => $this->celular,
                'area' => $this->area,
                'tipo' => $this->tipo,
                'email' => $this->email,
                'num_isset' => $this->num_isset,
            ]);

            $user->syncRoles($this->tipo);

            if ($this->password != null)
                //si el campo password (del form) trae algo lo actualiza 
                $user->update([
                    'password' => bcrypt($this->password),
                ]);

           
        }


        if ($this->selected_id)
        toastr()->success('Usuario Actualizado Correctamente');
        else
        toastr()->success('Usuario Creado Correctamente');


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
            $record = User::where('id', $id);
            $record->delete();
            $this->resetInput();
        }
    }
}
