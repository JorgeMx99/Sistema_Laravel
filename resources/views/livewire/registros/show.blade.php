<div>


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
                                 Módulo de Registros
                                </h2>
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    Datos Completos del Registro
                                </p>
                            </div>


                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <ul role="list"
                                    class="gap-3 px-6 py-4 font-normal text-gray-900 space-y-3 sm:space-y-4">
                                    <p class="text-base font-semibold text-gray-800 dark:text-gray-200">
                                        Datos registrados en Recepción
                                    </p>
                                    <li class="flex space-x-3">
                                        <!-- Solid Check -->
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5l-3.9 19.5m-2.1-19.5l-3.9 19.5" />
                                        </svg>

                                        <!-- End Solid Check -->
                                        <span class="text-sm sm:text-base text-gray-500"><b>Folio</b>
                                            <label class="text-sm sm:text-base text-gray-500"
                                                style="background-color:transparent; ">{{ $folio }}</label>
                                        </span>

                                    </li>
                                    <li class="flex space-x-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                          </svg>
                                          

                                        <span class="text-sm sm:text-base text-gray-500"><b>Fecha de Recepción:</b>
                                            <label class="text-sm sm:text-base text-gray-500"
                                                style="background-color:transparent; ">{{ $fecha_recepcion }}</label>
                                        </span>
                                    </li>

                                    <li class="flex space-x-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                          </svg>
                                          
                                          

                                        <span class="text-sm sm:text-base text-gray-500"><b>Hora de Recepción:</b>
                                            <label class="text-sm sm:text-base text-gray-500"
                                                style="background-color:transparent; ">{{ $hora_recepcion }}</label>
                                        </span>
                                    </li>

                                    <li class="flex space-x-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                          </svg>
                                          

                                        <span class="text-sm sm:text-base text-gray-500"><b>Tipo Documento:</b>
                                            <label class="text-sm sm:text-base text-gray-500"
                                                style="background-color:transparent; ">{{ $tipodocumento }}</label>
                                        </span>
                                    </li>


                                    <li class="flex space-x-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5l-3.9 19.5m-2.1-19.5l-3.9 19.5" />
                                        </svg>

                                        <span class="text-sm sm:text-base text-gray-500"><b>Número de Documento:</b>
                                            <label class="text-sm sm:text-base text-gray-500"
                                                style="background-color:transparent; ">{{ $num_documento }}</label>
                                        </span>
                                    </li>

                                    <li class="flex space-x-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                          </svg>
                                          

                                        <span class="text-sm sm:text-base text-gray-500"><b>Dependencia:</b>
                                            <label class="text-sm sm:text-base text-gray-500"
                                                style="background-color:transparent; ">{{ $dependencia }}</label>
                                        </span>
                                    </li>

                                    <li class="flex space-x-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                          </svg>
                                          

                                        <span class="text-sm sm:text-base text-gray-500"><b>Signado:</b>
                                            <label class="text-sm sm:text-base text-gray-500"
                                                style="background-color:transparent; ">{{ $signado }}</label>
                                        </span>
                                    </li>
                                    <li class="flex space-x-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                                          </svg>
                                          

                                        <span class="text-sm sm:text-base text-gray-500"><b>Cargo:</b>
                                            <label class="text-sm sm:text-base text-gray-500"
                                                style="background-color:transparent; ">{{ $cargo }}</label>
                                        </span>
                                    </li>

                                    <li class="flex space-x-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                                          </svg>
                                          

                                        <span class="text-sm sm:text-base text-gray-500"><b>Asunto:</b>
                                            <label class="text-sm sm:text-base text-gray-500"
                                                style="background-color:transparent; ">{{ $asunto }}</label>
                                        </span>
                                    </li>


                                    <li class="flex space-x-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                                          </svg>
                                          

                                        <span class="text-sm sm:text-base text-gray-500"><b>Dirigido a:</b>
                                            <label class="text-sm sm:text-base text-gray-500"
                                                style="background-color:transparent; ">{{ $dirigido }}</label>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <ul role="list"
                                    class="gap-3 px-6 py-4 font-normal text-gray-900 space-y-2 sm:space-y-4">
                                    <p class="text-base font-semibold text-gray-800 dark:text-gray-200">
                                        Datos registrados en Archivo
                                    </p>
                                    
                                    <li class="flex space-x-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                                          </svg>
                                          
                                        <span class="text-sm sm:text-base text-gray-500"><b>Anexos:</b>
                                            <label class="text-sm sm:text-base text-gray-500"
                                                style="background-color:transparent; ">{{ $anexo }}</label>
                                        </span>
                                    </li>
                                    <li class="flex space-x-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 21L3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5" />
                                          </svg>
                                          

                                        <span class="text-sm sm:text-base text-gray-500"><b>Seguimiento:</b>
                                            <label class="text-sm sm:text-base text-gray-500"
                                                style="background-color:transparent; ">{{ $seguimiento }}</label>
                                        </span>
                                    </li>
                                    <li class="flex space-x-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                                          </svg>
                                          

                                        <span class="text-sm sm:text-base text-gray-500"><b>Resguardo:</b>
                                            <label class="text-sm sm:text-base text-gray-500"
                                                style="background-color:transparent; ">{{ $resguardo }}</label>
                                        </span>
                                    </li>
                                    <li class="flex space-x-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                                          </svg>
                                          
                                        <span class="text-sm sm:text-base text-gray-500"><b>Hipervinculo:</b>
                                            <label class="text-sm sm:text-base text-gray-500"
                                                style="background-color:transparent; ">{{ $hipervinculo }}</label>
                                        </span>
                                    </li>

                                    <li class="flex space-x-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 13.5l3 3m0 0l3-3m-3 3v-6m1.06-4.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                                          </svg>
                                          
                                        <span class="text-sm sm:text-base text-gray-500"><b>Nombre del Expediente:</b>
                                            <label class="text-sm sm:text-base text-gray-500"
                                                style="background-color:transparent; ">{{ $nombre_expediente }}</label>
                                        </span>
                                    </li>

                                    <li class="flex space-x-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5l-3.9 19.5m-2.1-19.5l-3.9 19.5" />
                                        </svg>

                                        <span class="text-sm sm:text-base text-gray-500"><b>Sección:</b>
                                            <label class="text-sm sm:text-base text-gray-500"
                                                style="background-color:transparent; ">{{ $seccion }}</label>
                                        </span>
                                    </li>
                                    <li class="flex space-x-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6.878V6a2.25 2.25 0 012.25-2.25h7.5A2.25 2.25 0 0118 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 004.5 9v.878m13.5-3A2.25 2.25 0 0119.5 9v.878m0 0a2.246 2.246 0 00-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0121 12v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6c0-.98.626-1.813 1.5-2.122" />
                                          </svg>
                                          

                                        <span class="text-sm sm:text-base text-gray-500"><b>Unicación Física:</b>
                                            <label class="text-sm sm:text-base text-gray-500"
                                                style="background-color:transparent; ">{{ $ubicacion_fisica }}</label>
                                        </span>
                                    </li>
                                    <li class="flex space-x-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 110-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 01-1.44-4.282m3.102.069a18.03 18.03 0 01-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 018.835 2.535M10.34 6.66a23.847 23.847 0 008.835-2.535m0 0A23.74 23.74 0 0018.795 3m.38 1.125a23.91 23.91 0 011.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 001.014-5.395m0-3.46c.495.413.811 1.035.811 1.73 0 .695-.316 1.317-.811 1.73m0-3.46a24.347 24.347 0 010 3.46" />
                                          </svg>
                                          

                                        <span class="text-sm sm:text-base text-gray-500"><b>Observaciones:</b>
                                            <label class="text-sm sm:text-base text-gray-500"
                                                style="background-color:transparent; ">{{ $observaciones }}</label>
                                        </span>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <button wire:click="doAction(1)" type="button"
                            class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md bg-yellow-100 border border-transparent font-semibold text-yellow-500 hover:text-white hover:bg-yellow-100 focus:outline-none focus:ring-2 ring-offset-white focus:ring-yellow-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                            Regresar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
