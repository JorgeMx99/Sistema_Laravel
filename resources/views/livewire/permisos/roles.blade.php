<div class="grid grid-rows-2 grid-flow-col gap-4 bg-gray-50 p-4 rounded-lg dark:bg-gray-800{{ $tab == 'roles' ? 'show active' : '' }} " id="roles_content" role="tabpanel">

    <div class="row-span-2">

        <div class="w-full">
            <div class="flex items-center">
                <span>
                    <button onclick="clearRoleSelected()" type="button"
                        class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                        </svg>
                    </button>

                </span>
                <span>
                    <input type="text" id="roleName" name="hs-as-table-product-review-search" autocomplete="off"
                        class="py-2 px-3 pl-11 block w-full border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"></span>
                <input type="hidden" id="roleId">
                <div>

                    <span>
                        <button wire:click="$emit('CrearRole',$('#roleName').val(),$('#roleId').val())" type="button"
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



        <table id="tblRoles" class=" w-2/3a auto border-collapse bg-white text-left text-sm text-gray-500">

            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Descripción</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Usuarios</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Acciones</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                @foreach ($roles as $r)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $r->name }}</td>
                        <td class="px-6 py-4"> {{ \App\Models\User::role($r->name)->count() }}</td>
                        <td class="px-6 py-4">
                            <a  a href="javascript:void(0)" style="cursor: pointer" onclick="showRole('{{ $r }}')"><svg
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                            </a>

                            @if (\App\Models\User::role($r->name)->count() <= 0)
                                <a href="javascript:void(0)" 
                                onclick="Confirm('{{ $r->id }}','destroyRole')"
                                    tittle="Eliminar role"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </a>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex" id="divRoles">
                                <label>
                                <input data-name="{{$r->name}}" type="checkbox" class="new-control-input checkbox-rol" {{$r->checked
                                    == 1 ? 'checked' : '' }}>
                                  
                                <span for="hs-checkbox-group-1"
                                    class="text-sm text-gray-500 ml-3 dark:text-gray-400">Asignar</span>
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
                    <label for="hero-input" class="sr-only">Usuarios</label>
                    <select style="width:500" id="userId" wire:model="userSelected" class="w-1/3  py-3 px-4 pr-9 order-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                        <option value="Seleccionar">Seleccionar</option>
                        @foreach($usuarios as $u)
                        <option value="{{$u->id}}">{{$u->name}}</option>
                        @endforeach
                    </select>

                    <button type="button" onclick="AsignarRoles()" class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                        Asignar Rol
                    </button>

                </div>

            </div>
        </form>
    </div>

</div>

