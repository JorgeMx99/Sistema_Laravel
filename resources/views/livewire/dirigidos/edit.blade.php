
                <div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
                    <!-- Card -->
                    <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
                        <div class="mb-8">
                            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">
                                Modulo de Destinatarios
                            </h2>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Administre los Destinatarios de la Correspondencia.
                            </p>
                        </div>
                
                        <form>
                            @include('common.documentos.messages')
                            <!-- Grid -->
                            <div class="grid grid-cols-12 gap-4 sm:gap-6">
                                <!-- End Col -->
                
                                <div class="col-span-3">
                                    <label for="af-account-full-name"
                                        class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                                        Nombre
                                    </label>
                                </div>
                                <!-- End Col -->
                
                                <div class="col-span-9">
                                    <div class="sm:flex">
                                        <input onkeyup="mayus(this);" wire:model.lazy="nombre" id="af-account-full-name" type="text"
                                            class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm -mt-px -ml-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-l-lg sm:mt-0 sm:first:ml-0 sm:first:rounded-tr-none sm:last:rounded-bl-none sm:last:rounded-r-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                            placeholder="" maxlength="100">
                                    </div>
                                </div>
                                <div class="col-span-3">
                                    <label for="af-account-full-name"
                                        class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                                        Cargo
                                    </label>
                                </div>
                                <!-- End Col -->
                
                                <div class="col-span-9">
                                    <div class="sm:flex">
                                        <input onkeyup="mayus(this);" wire:model.lazy="cargo" id="af-account-full-name" type="text"
                                            class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm -mt-px -ml-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-l-lg sm:mt-0 sm:first:ml-0 sm:first:rounded-tr-none sm:last:rounded-bl-none sm:last:rounded-r-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                            placeholder="" maxlength="100">
                                    </div>
                                </div>
                                <div class="col-span-3">
                                    <label for="af-account-full-name"
                                        class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                                        Dependencia
                                    </label>
                                </div>
                                <!-- End Col -->
                
                                <div class="col-span-9">
                                    <div class="sm:flex">
                                        <input onkeyup="mayus(this);" wire:model.lazy="dependencia" id="af-account-full-name" type="text"
                                            class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm -mt-px -ml-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-l-lg sm:mt-0 sm:first:ml-0 sm:first:rounded-tr-none sm:last:rounded-bl-none sm:last:rounded-r-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                            placeholder="" maxlength="100">
                                    </div>
                                </div>
                                <div class="col-span-3">
                                    <label for="af-account-full-name"
                                        class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                                        Unidad
                                    </label>
                                </div>
                                <!-- End Col -->
                
                                <div class="col-span-9">
                                    <div class="sm:flex">
                                        <input onkeyup="mayus(this);" wire:model.lazy="unidad" id="af-account-full-name" type="text"
                                            class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm -mt-px -ml-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-l-lg sm:mt-0 sm:first:ml-0 sm:first:rounded-tr-none sm:last:rounded-bl-none sm:last:rounded-r-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                            placeholder="" maxlength="100">
                                    </div>
                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- End Grid -->
                
                            <div class="mt-5 flex justify-end gap-x-2">
                                <button wire:click="doAction(1)" type="button"
                                    class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                    Regresar
                                </button>
                                <button href="javascript:void(0);" onclick="New()" wire:click="StoreOrUpdate()" type="button"
                                    class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                    Guardar
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- End Card -->
                </div>
            
       
    


<!-- Card Section -->

<!-- End Card Section -->
