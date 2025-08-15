<nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16 items-center">
        <a href="/" class="flex items-center space-x-2 group">
            <img src="/dead-elephant.svg" alt="Логотип" title="На главную"
                 class="h-10 w-auto select-none transition-opacity duration-200 group-hover:opacity-80"/>
        </a>
        <div class="hidden md:flex items-center space-x-8 text-gray-400 text-sm font-medium select-none">
            <x-nav-link href="/" :active="request()->is('/')">
                Главная
            </x-nav-link>
            <x-nav-link href="/tests" :active="request()->is('tests')">
                Тесты
            </x-nav-link>
            <x-nav-link href="/questions" :active="request()->is('questions')">
                Вопросы
            </x-nav-link>

            @if(!auth()->check())
                @if(!request()->is('register') && !request()->is('login'))
                    <x-nav-link href="/register" :active="request()->is('register')"
                                class="border border-white/10 text-gray-300 hover:border-gray-400 hover:text-white px-3 py-1.5 rounded text-xs font-medium transition-all duration-200 {{ request()->is('register') ? 'text-black border-white' : '' }}">
                        Регистрация
                    </x-nav-link>
                @endif
            @else
                <div class="relative inline-block" id="user-menu-container">
                    <button id="user-menu-button"
                            class="flex items-center min-w-0 max-w-full px-3 py-1.5 text-sm text-gray-300 rounded-md transition-all duration-200 hover:bg-white/5"
                            type="button" aria-haspopup="true" aria-expanded="false">
                        <img src="/user.png"
                             alt="avatar"
                             class="h-4 w-4 rounded-full object-cover bg-black mr-2 transition-colors duration-200"/>
                        <span class="truncate transition-colors duration-200">
                {{ auth()->user()->name }}
            </span>
                    </button>

                    <div id="user-menu"
                         class="absolute right-0 top-full mt-1 w-36 bg-black border border-white/10 rounded-xl shadow-lg z-50 opacity-0 pointer-events-none transition-opacity duration-200"
                         style="transition-property: opacity;">
                        <a href="/account"
                           class="block px-3 py-2 text-sm text-gray-300 hover:bg-white/10 hover:text-white rounded-t-lg transition-colors duration-150">
                            Аккаунт
                        </a>
                        <form method="POST" action="/logout" class="m-0">
                            @csrf
                            <button type="submit"
                                    class="w-full text-left px-3 py-2 text-sm text-gray-300 hover:bg-white/10 hover:text-white rounded-b-lg transition-colors duration-150">
                                Выйти
                            </button>
                        </form>
                    </div>

                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', () => {
                        const button = document.getElementById('user-menu-button');
                        const menu = document.getElementById('user-menu');

                        function toggleMenu() {
                            const isVisible = menu.style.opacity === '1';
                            if (isVisible) {
                                menu.style.opacity = '0';
                                menu.style.pointerEvents = 'none';
                                button.setAttribute('aria-expanded', 'false');
                            } else {
                                menu.style.opacity = '1';
                                menu.style.pointerEvents = 'auto';
                                button.setAttribute('aria-expanded', 'true');
                            }
                        }

                        button.addEventListener('click', (e) => {
                            e.stopPropagation();
                            toggleMenu();
                        });

                        document.addEventListener('click', () => {
                            menu.style.opacity = '0';
                            menu.style.pointerEvents = 'none';
                            button.setAttribute('aria-expanded', 'false');
                        });

                        menu.addEventListener('click', (e) => {
                            e.stopPropagation();
                        });
                    });
                </script>
            @endif


        </div>
        <button
            class="md:hidden text-gray-400 hover:text-gray-200 focus:outline-none transition-colors duration-200"
            onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>

    <div id="mobile-menu" class="md:hidden hidden border-t border-gray-800 bg-black">
        <div class="px-4 py-3 space-y-1">
            <a href="/" class="block text-gray-400 hover:text-gray-200 py-2 text-sm transition-colors duration-200">
                Главная
            </a>
            <a href="/tests"
               class="block text-gray-400 hover:text-gray-200 py-2 text-sm transition-colors duration-200">
                Тесты
            </a>
            <a href="/questions"
               class="block text-gray-400 hover:text-gray-200 py-2 text-sm transition-colors duration-200">
                Вопросы
            </a>
            @if(!request()->is('register'))
                <a href="/register"
                   class="block border border-white/10 text-gray-300 hover:border-gray-400 hover:text-white px-3 py-2 rounded text-sm text-center mt-3 transition-all duration-200">
                    Регистрация
                </a>
            @endif
        </div>
    </div>
</nav>
