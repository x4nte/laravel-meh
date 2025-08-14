<x-layout>
    <section class="bg-black py-24 min-h-screen">
        <div class="max-w-4xl mx-auto px-6 sm:px-12 lg:px-16 space-y-12">
            <h1 class="text-4xl font-bold text-white tracking-tight border-b border-white/10 pb-6 text-center">
                Ваш аккаунт
            </h1>

            <div class="border border-white/10 rounded-2xl p-8 bg-black space-y-4 shadow-lg">
                <h2 class="text-2xl font-semibold text-white">Информация</h2>
                <div class="text-gray-400">
                    <form action="{{ route('account.updateEmail') }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="name" class="block text-gray-300">Имя</label>
                            <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}"
                                   class="mt-1 w-full bg-black border border-white/10 text-white rounded-xl px-4 py-2 focus:outline-none focus:border-white/30">
                        </div>
                        <div>
                            <label for="email" class="block text-gray-300">Email</label>
                            <input type="email" name="email" id="email"
                                   value="{{ old('email', auth()->user()->email) }}"
                                   class="mt-1 w-full bg-black border border-white/10 text-white rounded-xl px-4 py-2 focus:outline-none focus:border-white/30">
                        </div>

                        <button type="submit"
                                class="bg-white text-black font-semibold px-6 py-2 rounded-xl hover:bg-gray-100 transition duration-300">
                            Обновить
                        </button>
                    </form>
                </div>
            </div>

            <div class="border border-white/10 rounded-2xl p-8 bg-black space-y-6 shadow-lg">
                <h2 class="text-2xl font-semibold text-white">Сменить пароль</h2>
                <form action="{{route('account.updatePassword')}}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="current_password" class="block text-gray-300">Текущий пароль</label>
                        <input type="password" name="current_password" id="current_password"
                               class="mt-1 w-full bg-black border border-white/10 text-white rounded-xl px-4 py-2 focus:outline-none focus:border-white/30">
                    </div>

                    <div>
                        <label for="new_password" class="block text-gray-300">Новый пароль</label>
                        <input type="password" name="new_password" id="new_password"
                               class="mt-1 w-full bg-black border border-white/10 text-white rounded-xl px-4 py-2 focus:outline-none focus:border-white/30">
                    </div>

                    <div>
                        <label for="new_password_confirmation" class="block text-gray-300">Подтверждение пароля</label>
                        <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                               class="mt-1 w-full bg-black border border-white/10 text-white rounded-xl px-4 py-2 focus:outline-none focus:border-white/30">
                    </div>

                    <button type="submit"
                            class="bg-white text-black font-semibold px-6 py-2 rounded-xl hover:bg-gray-100 transition duration-300">
                        Обновить пароль
                    </button>
                </form>
            </div>


        </div>
    </section>
</x-layout>
