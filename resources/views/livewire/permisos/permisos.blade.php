<div class="grid grid-rows-2 grid-flow-col gap-4 bg-gray-50 p-4 rounded-lg dark:bg-gray-800 {{ $tab == 'permisos' ? 'show active' : '' }}" id="permisos_content" role="tabpanel">

    <div class="row-span-2">
        <div class="w-full">
            <div class="flex items-center">
                <span>

                    <button onclick="clearPermissionSelected()" type="button"
                    class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                    </svg>
                </button>

                </span>
                <span>
                    <input type="text" id="permissionName" name="hs-as-table-product-review-search" autocomplete="off"
                        class="py-2 px-3 pl-11 block w-full border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"></span>
                <input type="hidden" id="permissionId">
                <div>

                    <span>
                        <button wire:click="$emit('CrearPermiso',$('#permissionName').val(),$('#permissionId').val())" type="button"
                            class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                    </span>
                </div>
            </div>
        </div>




       
        <table id="tblPermisos"class=" w-2/3a auto border-collapse bg-white text-left text-sm text-gray-500">

            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Descripción</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Roles<br>con el permiso</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Acciones</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900"><div ><label><input type="checkbox"  class="check-all  shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"> 
                        Todos</label></th></div>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                @foreach ($permisos as $p)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            {{ $p->name }}
                        </td>
                        <td class="px-6 py-4"> {{ \App\Models\User::permission($p->name)->count() }}</td>

                        <td class="px-6 py-4">
                            <a  a href="javascript:void(0)" style="cursor: pointer" onclick="showPermission('{{ $p }}')"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                        </a>

                            @if (\App\Models\User::permission($p->name)->count() <= 0)

                            <a href="javascript:void(0);" onclick="ConfirmP('{{ $p->id }}')" data-toggle="tooltip" data-placement="top"
                                title="Eliminar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-trash-2 text-danger">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg></a>
                                
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex" id="divPermisos">
                                <input id="p{{$p->id}}" data-name="{{$p->name}}" type="checkbox"
                                class="new-control-input check-permiso" {{$p->checked == 1 ? 'checked' : '' }} >
                                <label for="hs-checkbox-group-1"
                                    class="text-sm text-gray-500 ml-3 dark:text-gray-400">Asignar</label>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="">
        <form>
            <div class="mt-5 lg:mt-8 flex flex-col items-center gap-2 sm:flex-row sm:gap-3">
                <div class="w-full">
                    <label for="hero-input" class="sr-only">Elegir Roles</label>
                    <select id="roleSelected" wire:model="roleSelected"
                        class="w-1/3  py-3 px-4 pr-9 order-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                        <option value="Seleccionar">Seleccionar</option>
                        @foreach($roles as $r)
                        <option value="{{$r->id}}">{{$r->name}}</option>
                        @endforeach
                    </select>

                    <button type="button"
                        onclick="AsignarPermisos()"class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                        Asignar Permisos
                    </button>
                </div>

            </div>
        </form>
    </div>

</div>
