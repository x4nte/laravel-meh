<x-layout>
    <section class="bg-black text-white py-12">
        <div class="max-w-5xl mx-auto px-6">
            <!-- Заголовок страницы -->
            <h1 class="text-4xl font-bold mb-8 text-center">Результаты теста</h1>

            <!-- Статистика -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-12">
                <div class="bg-white text-black p-6 rounded-2xl shadow-xl text-center">
                    <p class="text-2xl font-semibold">Верных ответов</p>
                    <p class="text-5xl font-bold mt-2">{{ $correct }}</p>
                </div>
                <div class="bg-black border border-white p-6 rounded-2xl shadow-xl text-center">
                    <p class="text-2xl font-semibold">Неверных ответов</p>
                    <p class="text-5xl font-bold mt-2">{{ $failed }}</p>
                </div>
            </div>

            <!-- Список вопросов -->
            <div class="space-y-8">
                @foreach($questions as $index => $question)
                    <div class="relative rounded-2xl p-6 border

                        {{ $question->know ? 'bg-green-900 border-green-500' : 'bg-red-900 border-red-500' }}">

                        <span class="absolute top-4 left-4 bg-black/50 px-3 py-1 rounded-full text-sm font-semibold">
                            Вопрос {{ $index + 1 }}
                        </span>

                        <h2 class="text-2xl font-bold mb-4 mt-6">{!! $question->title !!}</h2>

                        @if($question->shortAnswer)
                            <div class="mb-4">
                                <p class="text-lg text-gray-300">Краткий ответ:</p>
                                <div class="bg-gray-800 p-4 rounded-xl mt-2">
                                    {!! $question->shortAnswer !!}
                                </div>
                            </div>
                        @endif

                        @if($question->longAnswer)
                            <div>
                                <p class="text-lg text-gray-300">Подробный ответ:</p>
                                <div class="bg-gray-800 p-4 rounded-xl mt-2 leading-relaxed">
                                    {!! $question->longAnswer !!}
                                </div>
                            </div>
                        @endif

                        <p class="mt-4 font-semibold {{ $question->know ? 'text-green-400' : 'text-red-400' }}">
                            {{ $question->know ? 'Знаю' : 'Не знаю' }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-layout>
