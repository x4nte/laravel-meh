<x-layout>

    <section class="relative overflow-hidden bg-black py-32">
        <div class="relative max-w-7xl mx-auto px-6 sm:px-12 lg:px-16 text-center">
            <div class="space-y-12 max-w-4xl mx-auto">
                <h1 class="text-4xl sm:text-7xl font-semibold text-white tracking-wide select-none leading-tight">
                    Вопросы для
                    <span
                        class="inline-block bg-white text-black text-5xl font-bold px-6 py-2 rounded-full select-none align-middle">
                        PHP
    </span>
                    backend
                    собеседований
                </h1>


                <div class="pt-5">
                    <a href="/questions"
                       class="inline-flex items-center bg-white hover:bg-gray-100 text-black px-12 py-5 rounded-2xl font-bold text-lg tracking-wide transform hover:scale-105 transition-all duration-300 shadow-2xl hover:shadow-white/20">
                        Посмотреть вопросы
                        <svg class="ml-3 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>


    <section class="py-32 bg-black">
        <div class="max-w-7xl mx-auto px-6 sm:px-12 lg:px-16">
            <div class="grid md:grid-cols-3 gap-8">

                <a href="http://localhost:8000/questions/?sort=php"
                   class="group block bg-black border border-white/10 hover:border-white rounded-3xl p-12 transition-all duration-500 hover:transform hover:scale-105 relative overflow-hidden no-underline">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-transparent to-gray-900/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="relative z-10">
                        <div
                            class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mb-10 shadow-2xl group-hover:shadow-white/20 transition-all duration-500">
                            <span class="text-black font-black text-xl select-none">PHP</span>
                        </div>
                        <h3
                            class="text-3xl font-bold text-white mb-8 tracking-tight group-hover:text-gray-200 transition-colors duration-300">
                            Основы PHP
                        </h3>
                        <p class="text-gray-500 mb-10 leading-relaxed text-lg group-hover:text-gray-400 transition-colors duration-300">
                            Синтаксис, ООП, паттерны проектирования, работа с базами данных
                        </p>
                        <ul class="space-y-4 text-gray-500 group-hover:text-gray-400 transition-colors duration-300">
                            <li class="flex items-center">
                                <div
                                    class="w-2 h-2 bg-gray-600 rounded-full mr-4 group-hover:bg-gray-400 transition-colors duration-300"></div>
                                Переменные и типы данных
                            </li>
                            <li class="flex items-center">
                                <div
                                    class="w-2 h-2 bg-gray-600 rounded-full mr-4 group-hover:bg-gray-400 transition-colors duration-300"></div>
                                Классы и объекты
                            </li>
                            <li class="flex items-center">
                                <div
                                    class="w-2 h-2 bg-gray-600 rounded-full mr-4 group-hover:bg-gray-400 transition-colors duration-300"></div>
                                Namespace и автозагрузка
                            </li>
                            <li class="flex items-center">
                                <div
                                    class="w-2 h-2 bg-gray-600 rounded-full mr-4 group-hover:bg-gray-400 transition-colors duration-300"></div>
                                Исключения и ошибки
                            </li>
                        </ul>
                    </div>
                </a>

                <a href="http://localhost:8000/questions/?sort=laravel"
                   class="group block bg-black border border-white/10 hover:border-white rounded-3xl p-12 transition-all duration-500 hover:transform hover:scale-105 relative overflow-hidden no-underline">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-transparent to-gray-900/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="relative z-10">
                        <div
                            class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mb-10 shadow-2xl group-hover:shadow-white/20 transition-all duration-500">
                            <span class="text-black font-black text-xl select-none">LRV</span>
                        </div>
                        <h3
                            class="text-3xl font-bold text-white mb-8 tracking-tight group-hover:text-gray-200 transition-colors duration-300">
                            Laravel Framework
                        </h3>
                        <p class="text-gray-500 mb-10 leading-relaxed text-lg group-hover:text-gray-400 transition-colors duration-300">
                            Архитектура, компоненты, лучшие практики разработки
                        </p>
                        <ul class="space-y-4 text-gray-500 group-hover:text-gray-400 transition-colors duration-300">
                            <li class="flex items-center">
                                <div
                                    class="w-2 h-2 bg-gray-600 rounded-full mr-4 group-hover:bg-gray-400 transition-colors duration-300"></div>
                                Eloquent ORM
                            </li>
                            <li class="flex items-center">
                                <div
                                    class="w-2 h-2 bg-gray-600 rounded-full mr-4 group-hover:bg-gray-400 transition-colors duration-300"></div>
                                Middleware и Routes
                            </li>
                            <li class="flex items-center">
                                <div
                                    class="w-2 h-2 bg-gray-600 rounded-full mr-4 group-hover:bg-gray-400 transition-colors duration-300"></div>
                                Blade Templates
                            </li>
                            <li class="flex items-center">
                                <div
                                    class="w-2 h-2 bg-gray-600 rounded-full mr-4 group-hover:bg-gray-400 transition-colors duration-300"></div>
                                Artisan Commands
                            </li>
                        </ul>
                    </div>
                </a>

                <a href="http://localhost:8000/questions/?sort=sql"
                   class="group block bg-black border border-white/10 hover:border-white rounded-3xl p-12 transition-all duration-500 hover:transform hover:scale-105 relative overflow-hidden no-underline">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-transparent to-gray-900/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="relative z-10">
                        <div
                            class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mb-10 shadow-2xl group-hover:shadow-white/20 transition-all duration-500">
                            <span class="text-black font-black text-xl select-none">SQL</span>
                        </div>
                        <h3
                            class="text-3xl font-bold text-white mb-8 tracking-tight group-hover:text-gray-200 transition-colors duration-300">
                            Базы данных
                        </h3>
                        <p class="text-gray-500 mb-10 leading-relaxed text-lg group-hover:text-gray-400 transition-colors duration-300">
                            MySQL, PostgreSQL, оптимизация запросов, индексы
                        </p>
                        <ul class="space-y-4 text-gray-500 group-hover:text-gray-400 transition-colors duration-300">
                            <li class="flex items-center">
                                <div
                                    class="w-2 h-2 bg-gray-600 rounded-full mr-4 group-hover:bg-gray-400 transition-colors duration-300"></div>
                                SQL запросы
                            </li>
                            <li class="flex items-center">
                                <div
                                    class="w-2 h-2 bg-gray-600 rounded-full mr-4 group-hover:bg-gray-400 transition-colors duration-300"></div>
                                Миграции и схемы
                            </li>
                            <li class="flex items-center">
                                <div
                                    class="w-2 h-2 bg-gray-600 rounded-full mr-4 group-hover:bg-gray-400 transition-colors duration-300"></div>
                                Индексация
                            </li>
                            <li class="flex items-center">
                                <div
                                    class="w-2 h-2 bg-gray-600 rounded-full mr-4 group-hover:bg-gray-400 transition-colors duration-300"></div>
                                Query Builder
                            </li>
                        </ul>
                    </div>
                </a>

            </div>
        </div>
    </section>

</x-layout>
