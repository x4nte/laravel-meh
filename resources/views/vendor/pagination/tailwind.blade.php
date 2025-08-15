@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center mt-12">
        <div class="flex items-center space-x-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="relative inline-flex items-center px-4 py-3 text-sm font-medium text-gray-600 bg-black border border-white/10 cursor-default rounded-xl leading-5 select-none">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    Назад
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                   class="relative inline-flex items-center px-4 py-3 text-sm font-medium text-gray-400 bg-black border border-white/10 rounded-xl leading-5 hover:text-white hover:border-white/10 hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-20 active:bg-gray-700 transition-all duration-200 transform hover:scale-105">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    Назад
                </a>
            @endif

            {{-- Pagination Elements --}}
            <div class="flex items-center space-x-1 mx-4">
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <span class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-500 bg-transparent cursor-default leading-5 select-none">
                            {{ $element }}
                        </span>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span aria-current="page" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-black bg-white/90 border border-white cursor-default rounded-xl leading-5 shadow-lg select-none">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}"
                                   class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-400 bg-black border border-white/10 rounded-xl leading-5 hover:text-white hover:border-white/10 hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-20 active:bg-gray-700 transition-all duration-200 transform hover:scale-105"
                                   aria-label="Перейти на страницу {{ $page }}">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                   class="relative inline-flex items-center px-4 py-3 text-sm font-medium text-gray-400 bg-black border border-white/10 rounded-xl leading-5 hover:text-white hover:border-white/10 hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-20 active:bg-gray-700 transition-all duration-200 transform hover:scale-105">
                    Вперед
                    <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
            @else
                <span class="relative inline-flex items-center px-4 py-3 text-sm font-medium text-gray-600 bg-black border border-white/10 cursor-default rounded-xl leading-5 select-none">
                    Вперед
                    <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </span>
            @endif
        </div>

        {{-- Mobile Simple Pagination --}}
        <div class="flex justify-between flex-1 sm:hidden mt-6">
            @if ($paginator->onFirstPage())
                <span class="relative inline-flex items-center px-4 py-3 text-sm font-medium text-gray-600 bg-black border border-white/10 cursor-default leading-5 rounded-xl select-none">
                    Назад
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                   class="relative inline-flex items-center px-4 py-3 text-sm font-medium text-gray-400 bg-black border border-white/10 leading-5 rounded-xl hover:text-white hover:border-white/10 hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-20 transition-all duration-200">
                    Назад
                </a>
            @endif

            <div class="flex items-center space-x-2">
                <span class="text-sm text-gray-400">
                    Страница {{ $paginator->currentPage() }} из {{ $paginator->lastPage() }}
                </span>
            </div>

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                   class="relative inline-flex items-center px-4 py-3 text-sm font-medium text-gray-400 bg-black border border-white/10 leading-5 rounded-xl hover:text-white hover:border-white/10 hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-20 transition-all duration-200">
                    Вперед
                </a>
            @else
                <span class="relative inline-flex items-center px-4 py-3 text-sm font-medium text-gray-600 bg-black border border-white/10 cursor-default leading-5 rounded-xl select-none">
                    Вперед
                </span>
            @endif
        </div>
    </nav>
@endif
