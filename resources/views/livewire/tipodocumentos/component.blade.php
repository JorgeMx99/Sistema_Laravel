<div>

    @if ($action == 1)
        <!-- Table Section -->
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
                                        <i class="bi bi-person-lines-fill"></i> Módulo de Tipo de Documentos
                                    </h2>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        Agregue nuevos registros, edite y más.
                                    </p>
                                </div>

                                <div>
                                    <div class="inline-flex gap-x-2">
                                        @include('common.documentos.search')
                                        <a wire:click="doAction(2)"
                                            class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800"
                                            href="#">
                                            <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" viewBox="0 0 16 16" fill="none">
                                                <path d="M2.63452 7.50001L13.6345 7.5M8.13452 13V2"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                            </svg>
                                            Agregar Tipo de Documento
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Header -->

                            <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">

                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">ID</th>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Tipo de Documento</th>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Creado</th>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Ultima Actualización</th>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                                    @foreach ($documento as $d)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4"> {{ $d->id }}</td>
                                            <td class="px-6 py-4"> {{ $d->tipo}}</td>
                                            <td class="px-6 py-4"> {{ $d->created_at }}</td>
                                            <td class="px-6 py-4"> {{ $d->updated_at }}</td>
        
                                            <td class="px-6 py-4">
                                                <div class="flex justify-end gap-4">
                                    
                                                    @include('common.documentos.actions')

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($action == 2)
            @include('livewire.tipodocumentos.edit')

    @endif


</div>
</div>
</div>

<script>
    function Confirm(id) {
        Swal.fire({
            title: '¿Esta seguro de eliminar este registro?',
            text: "¡No podrás revertir esto !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar!',
            cancelButtonText: 'Cancelar!'
        }).then((result) => {
            if (result.isConfirmed) {

                livewire.emit('deleteRow', id)


                Swal.fire(
                    'Eliminado!',
                    'El registro se ha eliminado.',
                    'success'
                )
            }
        })
    }
</script>




<script>
 function mayus(e) {
        e.value = e.value.toUpperCase();
    }
</script>