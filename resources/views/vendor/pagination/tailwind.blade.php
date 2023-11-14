@if ($paginator->hasPages())
	<div
		class="bg-white px-4 py-3 flex items-center rounded-b-lg shadow justify-between border-t border-gray-200 sm:px-6"
	>
		{{-- Mobile view.--}}
		<div class="flex-1 flex justify-between sm:hidden" id="mobile">
			@if($paginator->onFirstPage())
				<button
					disabled
					class="relative inline-flex items-center px-4 py-2 bg-gray-200 cursor-not-allowed border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 focus:outline-none"
					id="mobile-prev"
				>
					Anterior
				</button>
			@else
				<button
					wire:click="previousPage"
					type="button"
					class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
				>
					Siguiente
				</button>
			@endif
			@if($paginator->hasMorePages())
				<button
					wire:click="nextPage"
					type="button"
					class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
					id="mobile-next"
				>
					Siguiente
				</button>
			@else
				<button
					disabled
					class="relative inline-flex items-center px-4 py-2 bg-gray-200 cursor-not-allowed border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 focus:outline-none "
				>
					Siguiente
				</button>
			@endif
		</div>
		{{--End mobile view.--}}

		{{--Desktop view--}}
		<div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
			<div>
				<p class="text-sm leading-5 text-gray-700">
					Mostrando
					<span id="first" class="font-medium">{{$paginator->firstItem()}}</span>
					de
					<span id="last" class="font-medium">{{$paginator->lastItem()}}</span>
					de
					<span id="total" class="font-medium">{{$paginator->total()}}</span>
					resultados
				</p>
			</div>
			<div>
				<nav class="relative z-0 inline-flex shadow-sm">
					@if($paginator->onFirstPage())
						<button
							disabled
							class="relative cursor-not-allowed inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-gray-100 text-sm leading-5 font-medium text-gray-500 focus:z-10 focus:outline-none"
						>
							<svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
								<path
									fill-rule="evenodd"
									d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
									clip-rule="evenodd"
								/>
							</svg>
						</button>
					@else
						<button
							wire:click="previousPage"
							type="button"
							class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150"
							aria-label="Previous"
							id="desktop-prev"
						>
							<svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
								<path
									fill-rule="evenodd"
									d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
									clip-rule="evenodd"
								/>
							</svg>
						</button>
					@endif

					{{--Pagination Elements--}}
					@foreach ($elements as $element)
						{{--"Three Dots" Separator--}}
						@if (is_string($element))
							<span class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-700">
								...
							</span>
						@endif

						{{--Array Of Links--}}
						@if (is_array($element))
							@foreach ($element as $page => $url)
								@if ($page == $paginator->currentPage())
									<button
										disabled
										class="-ml-px relative cursor-not-allowed inline-flex items-center px-4 py-2 border border-gray-300 bg-gray-200 text-sm leading-5 font-medium text-gray-800 focus:outline-none"
									>
										{{$page}}
									</button>
								@else
									<button
										wire:click="gotoPage({{ $page }})"
										type="button"
										class="hidden md:inline-flex -ml-px relative items-center px-4 py-2 border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
										id="{{$page}}"
									>
										{{$page}}
									</button>
								@endif
							@endforeach
						@endif
					@endforeach

					@if($paginator->hasMorePages())
						<button
							wire:click="nextPage"
							type="button"
							class="-ml-px relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150"
							aria-label="Next"
							id="desktop-next"
						>
							<svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
								<path
									fill-rule="evenodd"
									d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
									clip-rule="evenodd"
								/>
							</svg>
						</button>
					@else
						<button
							disabled
							class="-ml-px relative disabled cursor-not-allowed inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-gray-100 text-sm leading-5 font-medium text-gray-500 focus:z-10 focus:outline-none"
						>
							<svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
								<path
									fill-rule="evenodd"
									d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
									clip-rule="evenodd"
								/>
							</svg>
						</button>

					@endif
				</nav>
			</div>
		</div>
		{{--End desktop view--}}
	</div>
@endif