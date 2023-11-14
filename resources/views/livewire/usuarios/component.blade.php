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
                                        <i class="bi bi-person-lines-fill"></i> Módulo de Usuario
                                    </h2>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        Agregue usuarios, edite y más.
                                    </p>
                                </div>

                                <div>


                                    <div class="inline-flex gap-x-2">

                                        @include('common.search')
                                        <a wire:click="doAction(2)"
                                            class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800"
                                            href="#">
                                            <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" viewBox="0 0 16 16" fill="none">
                                                <path d="M2.63452 7.50001L13.6345 7.5M8.13452 13V2"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                            </svg>
                                            Agregar Usuario
                                        </a>


                                    </div>
                                </div>

                            </div>
                            <!-- End Header -->


                            <nav class="flex space-x-2 px-6" aria-label="Tabs" role="tablist">
                                <button type="button"
                                    class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-2 border-b-[3px] border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 active"
                                    id="tabs-with-underline-item-1" id="pills-on-gray-color-item-1"
                                    data-hs-tab="#pills-on-gray-color-1" aria-controls="pills-on-gray-color-1"
                                    role="tab">
                                    Vista Básica
                                </button>
                                <button type="button"
                                    class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-2 border-b-[3px] border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600"
                                    id="pills-on-gray-color-item-2" data-hs-tab="#pills-on-gray-color-2"
                                    aria-controls="pills-on-gray-color-2" role="tab">
                                    Vista Avanzada
                                </button>

                            </nav>

                            <div class="mt-3">
                                <div id="pills-on-gray-color-1" role="tabpanel"
                                    aria-labelledby="pills-on-gray-color-item-1">
                                    @include('livewire.usuarios.iconos')
                                </div>
                                <div id="pills-on-gray-color-2" class="hidden" role="tabpanel"
                                    aria-labelledby="pills-on-gray-color-item-2">
                                    @include('livewire.usuarios.lista')
                                </div>
                            </div>




                        </div>
                    </div>
                </div>
            </div>
        @elseif($action == 2)
            @include('livewire.usuarios.formulario')
        @elseif($action == 3)
            @include('livewire.usuarios.general')
    @endif


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
