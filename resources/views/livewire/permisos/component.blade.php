<div>
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Card -->
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div
                        class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-slate-900 dark:border-gray-700">
                        <!-- Header -->
                        <div
                            class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                                    Módulo de Roles y Permisos
                                </h2>
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    Agregue usuarios, edite y más.
                                </p>

                            </div>

                            <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                                    data-tabs-toggle="#myTabContent" role="tablist">
                                    <li class="mr-2" role="presentation">
                                        <button
                                            class="inline-block p-4 border-b-2 rounded-t-lg
                                             {{ $tab == 'roles' ? 'active' : '' }}" wire:click="$set('tab', 'roles')" id="tabRoles" 
                                            data-toggle="pill" href="#roles_content" role="tab" 
                                            aria-controls="profile" aria-selected="true">Roles</button>
                                    </li>
                                    <li class="mr-2" role="presentation">
                                        <button
                                            class="inline-block p-4 border-b-2 border-transparent 
                                            rounded-t-lg hover:text-gray-600 hover:border-gray-300 
                                            dark:hover:text-gray-300 
                                            {{ $tab == 'permisos' ? 'active' : '' }}" wire:click="$set('tab', 'permisos')" id="tabPermisos"  
                                            data-toggle="pill" href="#permisos_content" role="tab">Permisos</button>
                                    </li>
                                </ul>
                            </div>


                        </div>

                        <div>
                            @if($tab == 'roles')
                            @include('livewire.permisos.roles')
                            @else ($tab == 'permisos')
                            @include('livewire.permisos.permisos')
                            @endif
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {

        window.livewire.on('msg-ok', msgText => {
            $('#permisoId').val(0)
            $('#permisoName').val('')
            $('#roleId').val(0)
            $('#roleName').val('')
        })

        $('body').on('click', '.check-all', function() { //*

            var state = $(this).is(':checked') ? true : false

            $("#tblPermisos").find('input[type=checkbox]').each(function(e) {

                $(this).prop('checked', state)

            })

        })


    })
</script>




<script>
    function showRole(role) {
        var data = JSON.parse(role)
        $('#roleName').val(data['name'])
        $('#roleId').val(data['id'])
    }
</script>

<script>
    function clearRoleSelected() {
        $('#roleName').val('')
        $('#roleId').val(0)
        $('#roleName').focus()
    }
</script>

<script>
    function showPermission(permission) {
        var data = JSON.parse(permission)
        $('#permissionName').val(data['name'])
        $('#permissionId').val(data['id'])
    }
</script>

<script>
    function clearPermissionSelected() {
        $('#permissionName').val('')
        $('#permissionId').val(0)
        $('#permissionName').focus()
    }
</script>

<script>
    function AsignarRoles() {
        console.clear()  
        var rolesList = [];
        $('#tblRoles').find('input[type=checkbox]:checked').each(function() {
            rolesList.push(($(this).attr("data-name")));
        });
        console.log(rolesList)

        if (rolesList.length < 1) {

            return;
        } else if ($('#userId option:selected').val() == 'Seleccionar') {
        
            return;
        }

        window.livewire.emit('AsignarRoles', rolesList)
    }
</script>

<script>
    function AsignarPermisos() {
        if ($('#roleSelected option:selected').val() == 'Seleccionar') //*
        {
       
            return;
        }

        var permisosList = [];
        $('#tblPermisos').find('input[type=checkbox]:checked').each(function() {
            permisosList.push(($(this).attr("data-name")));
        });


        if (permisosList.length < 1) {
         
            return;
        }


        window.livewire.emit('AsignarPermisos', permisosList, $('#roleSelected option:selected').val()) //*
    }
</script>



<script type="text/javascript">
    function Confirm(id) {
        Swal.fire({
            title: '¿Esta seguro de eliminar este registro?',
            text: "¡No podrás revertir esto !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {

                livewire.emit('destroyRole', id)

                $('#roleName').val('')
                $('#roleId').val(0)

                Swal.fire(
                    'Eliminado!',
                    'El registro se ha eliminado.',
                    'success'
                )
            }
        })
    }
</script>


<script type="text/javascript">
    function ConfirmP(id) {
        Swal.fire({
            title: '¿Esta seguro de eliminar este registro?',
            text: "¡No podrás revertir esto !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {

                livewire.emit('destroyPermiso', id)
                $('#permissionName').val('')
                $('#permissionId').val(0)


                Swal.fire(
                    'Eliminado!',
                    'El registro se ha eliminado.',
                    'success'
                )
            }
        })
    }
</script>
