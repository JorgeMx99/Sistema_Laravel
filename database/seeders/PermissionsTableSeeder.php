<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Lista de permisos
        Permission::create(['name'=>'usuarios_index']);
        Permission::create(['name'=>'usuarios_create']);
        Permission::create(['name'=>'usuarios_edit']);
        Permission::create(['name'=>'usuarios_destroy']);

        //Lista de Roles
        $admin =Role::create(['name'=>'Administrador']);
        $encargado =Role::create(['name'=>'Encargado']);
        $usu_rec =Role::create(['name'=>'Usuario Recepción']);
        $usu_arch =Role::create(['name'=>'Usuario Archivo']);
    
        $admin->givePermissionTo([
            'usuarios_index',
            'usuarios_create',
            'usuarios_edit',
            'usuarios_destroy'
        ]);

        $admins = User::where('tipo', 'Administrador')->get();
        foreach ($admins as $user) 
        {
            $user->assignRole('Administrador');
        }
    }
}
