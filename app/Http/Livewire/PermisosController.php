<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;


class PermisosController extends Component
{

    public $permisoTitle = "Crear", $roleTitle = "Crear", $userSelected;
    public $tab = "roles", $roleSelected;


    public function render()
    {
       
		$roles = Role::select('*', DB::RAW("0 as checked "))->get();
		$permisos = Permission::select('*', DB::RAW("0 as checked "))->get(); //*
		//$permisos = Permission::select('*', DB::RAW("0 as checked "))->get(); //*

		if ($this->userSelected != '' && $this->userSelected != 'Seleccionar') {
			foreach ($roles as $r) {
				$user = User::find($this->userSelected);
				$tieneRole = $user->hasRole($r->name);
				if ($tieneRole) {
					$r->checked = 1;
				}
			}
		}
		if ($this->roleSelected != '' && $this->roleSelected != 'Seleccionar') //*
		{
			foreach ($permisos as $p) {
				$role = Role::find($this->roleSelected);
				$tienePermiso = $role->hasPermissionTo($p->name);
				if ($tienePermiso) {
					$p->checked = 1;
				}
			}
		}

        return view('livewire.permisos.component', [
            'roles' => $roles,
            'permisos' => $permisos,
            'usuarios' => User::select('id', 'name')->get()
        ]);
    }


 /*-----------------------------------------------------------------------
								SECCION ROLES
	  -----------------------------------------------------------------------
	*/
	public function resetInput()
	{
		$this->roleTitle = 'Crear';
		$this->permisoTitle = 'Crear';
		$this->userSelected = '';  //*
		$this->roleSelected = '';  //*  	

	}


	public function CrearRole($roleName, $roleId)
	{
		if ($roleId)
			$this->UpdateRole($roleName, $roleId);
		else
			$this->SaveRole($roleName);
	}


	public function SaveRole($roleName)
	{

		$role = Role::where('name', $roleName)->first();

		if ($role) {
			toastr()->warning('El role que intentas registrar ya existe en sistema');
			return;
		}

		Role::create([
			'name' => $roleName
		]);

		toastr()->success('Se registró el rol correctamente');
		$this->resetInput();
	}



	public function UpdateRole($roleName, $roleId)
	{

		$role = Role::where('name', $roleName)->where('id', '<>', $roleId)->first();      //*

		if ($role) {	                                                                   //*
			toastr()->warning('El role que intentas registrar ya existe en sistema');
			return;
		}	                                                                               //*

		$role = Role::find($roleId);
		$role->name = $roleName;
		$role->save();
		toastr()->success('Se actualizó el role correctamente');
		$this->resetInput();
	}


	public function destroyRole($roleId)
	{
		Role::find($roleId)->delete();
		toastr()->success('Se eliminó el role correctamente');
	}


	public function AsignarRoles($rolesList)
	{
		if ($this->userSelected > 0) {
			$user = User::find($this->userSelected);

			if ($user) {
				$user->syncRoles($rolesList);
				toastr()->success('Roles asignados correctamente');
				$this->resetInput();
			}
		}
	}





	protected $listeners = [
		'destroyRole'     => 'destroyRole',
		'destroyPermiso'  => 'destroyPermiso',
		'CrearPermiso'    => 'CrearPermiso',
		'CrearRole'       => 'CrearRole',
		'AsignarRoles'    => 'AsignarRoles',
		'AsignarPermisos'    => 'AsignarPermisos'
	];






    public function CrearPermiso($permisoName, $permisoId)
	{

		if ($permisoId)
			$this->UpdatePermiso($permisoName, $permisoId);
		else
			$this->SavePermiso($permisoName);
	}

	public function SavePermiso($permisoName)
	{
		$permiso = Permission::where('name', $permisoName)->first();

		if ($permiso) {
			toastr()->warning('El permiso que intentas registrar ya existe en sistema');
			return;
		}

		Permission::create(['name' => $permisoName]);
		toastr()->success('Permiso Registrado correctamente');
		
		$this->resetInput();
	}


	public function UpdatePermiso($permisoName, $permisoId)
	{
		$permiso = Permission::where('name', $permisoName)->where('id', '<>', $permisoId)->first();

		if ($permiso) {
			toastr()->warning('El permiso que intentas registrar ya existe en sistema');
			return;
		}

		$permiso = Permission::find($permisoId);
		$permiso->name = $permisoName;
		$permiso->save();
		toastr()->success('Permiso Actualizado correctamente');
		$this->resetInput();
	}


	public function destroyPermiso($permisoId)
	{
		Permission::find($permisoId)->delete();
		toastr()->success('Permiso Eliminado correctamente');
	}


	public function AsignarPermisos($permisosList, $roleId)
	{
		if ($roleId > 0) {
			$role = Role::find($roleId);

			if ($role) {
				$role->syncPermissions($permisosList);
				toastr()->success('Permisos asignados correctamente');
				$this->resetInput();
			}
		}
	}
}
