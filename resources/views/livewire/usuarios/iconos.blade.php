<!-- Team -->
<div class="max-w-5xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Grid -->

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-8 md:gap-12">
        @forelse ($info as $i)
            <div class="text-center">
                <img data-hs-overlay="#hs-subscription-with-image{{ $i->id }}"
                    class="rounded-full w-24 h-24 mx-auto" src="{{ $i->profile_photo_url }}" alt="Image Description">
                <div class="mt-2 sm:mt-4">
                    <h3 class="font-medium text-gray-800 dark:text-gray-200">
                        {{ $i->name }}
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        {{ $i->tipo }}
                    </p>
                </div>
            </div>
        @empty
        @endforelse
        <!-- End Col -->
    </div>

    <!-- End Grid -->
</div>
<!-- End Team -->



@foreach ($info as $i)
    <div id="hs-subscription-with-image{{ $i->id }}"
        class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto">
        <div
            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
            <div class="relative flex flex-col bg-white shadow-lg rounded-xl dark:bg-gray-800">
                <div class="absolute top-2 right-2">
                    <button type="button"
                        class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md text-gray-500 hover:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-sm dark:focus:ring-gray-700 dark:focus:ring-offset-gray-800"
                        data-hs-overlay="#hs-subscription-with-image{{ $i->id }}">
                        <span class="sr-only">Close</span>
                        <svg class="w-3.5 h-3.5" width="8" height="8" viewBox="0 0 8 8" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z"
                                fill="currentColor" />
                        </svg>
                    </button>
                </div>


                <!-- Invoice -->
                <div class="max-w px-4 sm:px-6 lg:px-8 mx-auto my-4 sm:my-10">
                    <div class="mx-auto">
                        <!-- Card -->
                        <div class="flex flex-col p-4">
                            <!-- Grid -->
                            <div class="flex justify-center">

                                <!-- Col -->

                                <div class="text-center">


                                    @if ($i->tipo == 'Administrador')
                                        <P
                                            class="mt-2 text-lg md:text-xl font-semibold text-blue-600 dark:text-white text-center">
                                            {{ $i->tipo }} </P>
                                    @endif
                                    @if ($i->tipo == 'Encargado')
                                        <P
                                            class="mt-2 text-lg md:text-xl font-semibold text-red-600 dark:text-white text-center">
                                            {{ $i->tipo }} </P>
                                    @endif
                                    @if ($i->tipo == 'Usuario Recepción')
                                        <P
                                            class="mt-2 text-lg md:text-xl font-semibold text-green-600 dark:text-white text-center">
                                            {{ $i->tipo }} </P>
                                    @endif
                                    @if ($i->tipo == 'Usuario Archivo')
                                        <P
                                            class="mt-2 text-lg md:text-xl font-semibold text-yellow-600 dark:text-white text-center">
                                            {{ $i->tipo }} </P>
                                    @endif

                                    <address class="mt-4 not-italic text-gray-800 dark:text-gray-200">

                                        <p class="text-lg font-semibold text-gray-800 dark:text-gray-200">Ingreso: <span
                                                class="mt-5 text-sm text-gray-500"> {{ $i->created_at }} </span></p>
                                        <br>
                                    </address>
                                </div>


                            </div>

                            <div class="flex justify-center">

                                <img class="rounded-full" src="{{ $i->profile_photo_url }}" alt="" />
                            </div>

                            <!-- End Grid -->

                            <!-- Grid -->
                            <div class="mt-8 grid sm:grid-cols-1 gap-1">
                                <div>

                                    <address class="mt-2 not-italic text-gray-500">
                                        <p class="text-lg font-semibold text-gray-800 dark:text-gray-200">Nombre: <span
                                                class="mt-5 text-sm text-gray-500"> {{ $i->name }} </span></p>
                                        <p class="text-lg font-semibold text-gray-800 dark:text-gray-200">Área: <span
                                                class="mt-5 text-sm text-gray-500"> {{ $i->area }} </span></p>
                                        <p class="text-lg font-semibold text-gray-800 dark:text-gray-200">Correo
                                            Electronico: <span
                                                class="mt-5 text-sm text-gray-500">{{ $i->email }}</span></p>
                                        <p class="text-lg font-semibold text-gray-800 dark:text-gray-200">Número de
                                            ISSET: <span class="mt-5 text-sm text-gray-500">{{ $i->num_isset }}</span>
                                        </p>
                                        <p class="text-lg font-semibold text-gray-800 dark:text-gray-200">Celular: <span
                                                class="mt-5 text-sm text-gray-500">{{ $i->celular }}</span></p>
                                    </address>
                                </div>

                            </div>
                            <!-- End Grid -->

                            <div class="text-center">
                                <p class="mt-5 text-sm text-gray-500">Secretaria de Ordenamiento Territorial y Obras
                                    Públicas</p>
                                <p class="mt-5 text-sm text-gray-500"><?php echo date('Y'); ?> © Derechos Reservados</p>
                            </div>
                        </div>
                        <!-- End Card -->


                    </div>
                </div>
                <!-- End Invoice -->

            </div>
        </div>
    </div>
@endforeach
