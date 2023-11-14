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
                                        <i class="bi bi-person-lines-fill"></i> Módulo de Registros de Oficios
                                    </h2>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        Agregue oficios, edite y más.
                                    </p>
                                </div>

                                <div>
                                    <div class="inline-flex gap-x-2">
                                        @include('common.registros.search')

                                        @can('registros_create')
                                            <a wire:click="doAction(2)"
                                                class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800"
                                                href="#">
                                                <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" viewBox="0 0 16 16" fill="none">
                                                    <path d="M2.63452 7.50001L13.6345 7.5M8.13452 13V2"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                                </svg>
                                                Agregar Registro
                                            </a>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                            <!-- End Header -->

                            <table class="w-full border-collapse bg-white text-center text-sm text-gray-500 table-auto">

                                <thead class="bg-gray-50 ">
                                    <tr>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Folio</th>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Tipo de Documento
                                        </th>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Fecha de Recepción</th>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Signado</th>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Dependencia</th>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Status</th>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100 border-t border-gray-100 text-center">
                                    @foreach ($info as $registros)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4"> {{ $registros->id }}</td>
                                            <td class="px-6 py-4 underline decoration-sky-500"> {{ $registros->documento->tipo }}</td>
                                            <td class="px-6 py-4"> {{ $registros->fecha_recepcion }}</td>
                                            <td class="px-6 py-4"> {{ $registros->signado }}</td>
                                            <td class="px-6 py-4"> {{ $registros->dependencia }}</td>
                                            <td class="px-6 py-4">

                                          
                                                    @if ($registros->status == 'RECEPCIÓN')
                                                        <span
                                                            class="inline-flex  gap-1 rounded-full bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600">
                                                            {{ $registros->status }}
                                                        </span>
                                                    @endif
                                                    @if ($registros->status == 'ARCHIVO SIN RESPUESTA')
                                                        <span
                                                            class="inline-flex  gap-1 rounded-full bg-red-50 px-2 py-1 text-xs font-semibold text-red-600">
                                                            {{ $registros->status }}
                                                        </span>
                                                    @endif
                                                    @if ($registros->status == 'ARCHIVO CON RESPUESTA')
                                                        <span
                                                            class="inline-flex gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                                                            {{ $registros->status }}
                                                        </span>
                                                    @endif


                                              


                                            </td>

                                            <td class="px-6 py-4">

                                                @include('common.registros.actions')

                        </div>
                        </td>
                        </tr>
    @endforeach
    </tbody>
    </table>
    {{ $info->links() }}

</div>
</div>
</div>
</div>
@elseif($action == 2)
@include('livewire.registros.formulario')
@elseif($action == 3)
@include('livewire.registros.show')
@endif


</div>



@foreach ($info as $registros)
    <div id="hs-subscription-with-image3{{ $registros->id }}"
        class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto">
        <div
            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-3xl sm:w-full m-3 sm:mx-auto">
            <div class="relative flex flex-col bg-white shadow-lg rounded-xl dark:bg-gray-800">
                <div class="absolute top-2 right-2">
                    <button type="button"
                        class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md text-gray-500 hover:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-sm dark:focus:ring-gray-700 dark:focus:ring-offset-gray-800"
                        data-hs-overlay="#hs-subscription-with-image3{{ $registros->id }}">
                        <span class="sr-only">Close</span>
                        <svg class="w-3.5 h-3.5" width="8" height="8" viewBox="0 0 8 8" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z"
                                fill="currentColor" />
                        </svg>
                    </button>
                </div>

                <div class="max-w-4xl">
                    <div class="mx-auto">
                        <div class="flex flex-col p-4">

                            <div class="flex flex-col p-4 sm:p-6 bg-white">
                                <!-- Grid -->
                                <div class="flex justify-between">
                                  <div>
                                    <svg class="w-10 h-10" width="36" height="36" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path  d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 011.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 00-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 01-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5a3.375 3.375 0 00-3.375-3.375H9.75" class="stroke-blue-600 dark:stroke-white" stroke="currentColor" stroke-width="2"/>

                                    </svg>
                        
                                    <h1 class="mt-3 text-4xl md:text-4xl font-semibold text-blue-600 dark:text-white">SCO</h1>
                                  </div>
                                  <!-- Col -->
                        
                                  <div class="text-right">
                                    <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 dark:text-gray-200">FOLIO <a class="text-red-600">#{{$registros->id}}</a></h2>
                         
                        
                                    <address class="mt-4 not-italic text-gray-800 dark:text-gray-200">
                                      <b class="text-indigo-400">{{$registros->documento->tipo}}</b><br>
                                      <B>No. DOC: </B>{{$registros->num_documento}}<br>
                                      <B>EXP: </B>{{$registros->nombre_expediente}}<br>
                                   
                                    @if ($registros->status == 'ARCHIVO CON RESPUESTA')
                                    <B>STATUS: </B> <b class="inline-flex items-center gap-1 px-2 py-1  font-semibold text-green-600">{{ $registros->status }}</b></B>
                                    @endif
                                    @if ($registros->status == 'ARCHIVO SIN RESPUESTA')
                                    <B>STATUS: </B> <b class="inline-flex items-center gap-1  px-2 py-1  font-semibold text-red-600">{{ $registros->status }}</b></B>
                                    @endif

                                    @if ($registros->status == 'RECEPCIÓN')
                                    <B>STATUS: </B> <b class="inline-flex items-center gap-1 px-2 py-1  font-semibold text-blue-600">{{ $registros->status }}</b></B>
                                    @endif


                                    
                                    </address>
                                  </div>
                                  <!-- Col -->
                                </div>
                                <!-- End Grid -->
                        
                                <!-- Grid -->
                                <div class="mt-8 grid sm:grid-cols-2 gap-3">
                                  <div>
                                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">DIRIGIDO A:</h3>
                                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{$registros->dirigido->nombre}}</h3>
                                    <address class="mt-2 not-italic text-gray-500">
                                        
                                      <b>SIGNADO POR: </b>{{$registros->signado}}<br>
                                      <b>CARGO: </b>{{$registros->cargo}}<br>
                                      <b>DEPENDENCIA: </b>{{$registros->dependencia}}<br>
                                      <b>ASUNTO: </b>{{$registros->asunto}}<br>
                                      <b>ANEXOS: </b>{{$registros->anexo->anexos}}<br>
                                    </address>
                                  </div>
                                  <!-- Col -->
                        
                                  <div class="sm:text-right space-y-2">
                                    <!-- Grid -->
                                    <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
                                      <dl class="grid sm:grid-cols-5 gap-x-3">
                                        <dt class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">FECHA DE RECEPCIÓN:</dt>
                                        <dd class="col-span-2 text-gray-500">{{$registros->fecha_recepcion}}</dd>
                                      </dl>
                                      <dl class="grid sm:grid-cols-5 gap-x-3">
                                        <dt class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">HORA DE RECEPCIÓN:</dt>
                                        <dd class="col-span-2 text-gray-500">{{$registros->hora_recepcion}}</dd>
                                      </dl>

                                      
                                    </div>

                                    <address class="mt-2 text-left  not-italic text-gray-500">
                                       
                                        <b>SEGUIMIENTO: </b>{{$registros->seguimiento}}<br>
                                        <b>RESGUARGO: </b>{{$registros->resguardo}}<br>
                                        <b>SECCION: </b>{{$registros->seccion}}<br>
                                        <b>HIPERVINCULO: </b>{{$registros->hipervinculo}}<br>
                                        <b>UBICACIÓN FISICA: </b>{{$registros->ubicacion_fisica}}<br>
                                        
                                      </address>
                                    <!-- End Grid -->
                                  </div>
                                  <!-- Col -->

                                  <div>
                                  
                
                                      <b>RESPUESTA: </b><a class="not-italic text-gray-500">{{$registros->observaciones}}</a>
                                
                                  </div>

                                 
                                </div>
                                <!-- End Grid -->
                        

                        

                        
                                <p class="mt-5 text-center text-sm text-gray-500">Secretaria de Ordenamiento Territorial y ObrasPúblicas</p>
                                <p class="mt-5 text-center text-sm text-gray-500"><?php echo date('Y'); ?> © Derechos Reservados</p>
                              </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endforeach



















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
