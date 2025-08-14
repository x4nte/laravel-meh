<x-layout class="overflow-hidden">
    <section class="bg-black min-h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-md space-y-8">
            <div class="bg-black border border-white/10 rounded-2xl p-8 shadow-lg transition-all">
                <div class="text-center mb-6">
                    <h1 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight select-none drop-shadow-lg">
                        Войдите в аккаунт
                    </h1>
                </div>

                <form method="POST" action="/login" class="space-y-6 mt-2">
                    @csrf


                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Email</label>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            required
                            placeholder=""
                            class="w-full bg-black border border-white/10 text-white px-4 py-3 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-white focus:border-white placeholder-gray-500"
                        >
                        @error('email')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-300 mb-1">Пароль</label>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            required
                            placeholder=""
                            class="w-full bg-black border border-white/10 text-white px-4 py-3 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-white focus:border-white placeholder-gray-500"
                        >
                        @error('password')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center">
                        <input
                            id="remember"
                            name="remember"
                            type="checkbox"
                            class="h-4 w-4 rounded-sm border border-white/10 bg-black text-white focus:ring-0 focus:outline-none transition-none"
                        >
                        <label for="remember" class="ml-2 block text-sm text-gray-300">
                            Запомнить меня
                        </label>
                    </div>



                    <div>
                        <button
                            type="submit"
                            class="w-full bg-white hover:bg-gray-100 text-black px-6 py-4 rounded-lg font-semibold tracking-wide transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-white focus:ring-opacity-50 transition-all text-1xl"
                        >
                            Войти
                        </button>
                    </div>


                    <div class="text-center pt-4 border-t border-white/10">
                        <p class="text-gray-400 text-sm">
                            Нет аккаунта?
                            <a href="/register" class="text-white hover:text-gray-300 font-semibold underline">Зарегистрироваться</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-layout>
