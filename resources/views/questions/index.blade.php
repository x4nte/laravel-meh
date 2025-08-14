<x-layout>

    <section class="relative overflow-hidden bg-black py-16">
        <div class="relative max-w-7xl mx-auto px-6 text-center">
            <h1 class="text-4xl sm:text-5xl font-extrabold text-white tracking-tight">
                Все вопросы
            </h1>
            <p class="text-gray-400 text-lg mt-4">
                Всего вопросов: <span class="text-white font-semibold">{{ count(\App\Models\Question::all()) }}</span>
            </p>
        </div>
    </section>


    <section class="py-12 bg-black min-h-screen">
        <div class="max-w-6xl mx-auto px-6">


            <div class="flex justify-between items-center mb-8">
                <form method="GET" action="/questions/">
                    <select name="sort" onchange="this.form.submit()"
                            class="bg-black border border-white/10 text-white px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Все темы</option>
                        <option value="php" {{ request('sort') === 'php' ? 'selected' : '' }}>PHP</option>
                        <option value="laravel" {{ request('sort') === 'laravel' ? 'selected' : '' }}>Laravel</option>
                        <option value="sql" {{ request('sort') === 'sql' ? 'selected' : '' }}>Базы данных</option>
                    </select>
                </form>

                @if(isset(auth()->user()->is_admin) && auth()->user()->is_admin == true)
                    <a href="/admin/questions/create"
                       class="bg-white text-black px-6 py-3 rounded-xl font-semibold hover:bg-gray-200 transition-colors">
                        Создать вопрос
                    </a>
                @endif
            </div>


            <div class="space-y-6">
                @forelse($questions as $question)
                    <div
                        class="bg-black border border-white/10 rounded-2xl p-6 hover:border-white/30 transition-colors">


                        <div class="flex justify-between items-start mb-4">
                            <div class="flex-1">
                                @php
                                    $topicColors = [
                                        'php' => 'bg-blue-900 text-blue-300',
                                        'laravel' => 'bg-red-900 text-red-300',
                                        'sql' => 'bg-green-900 text-green-300'
                                    ];
                                    $topicNames = [
                                        'php' => 'PHP',
                                        'laravel' => 'Laravel',
                                        'sql' => 'Базы данных'
                                    ];
                                @endphp
                                <span
                                    class="inline-block px-3 py-1 rounded-full text-sm font-medium mb-3 {{ $topicColors[$question->topic->title] ?? 'bg-gray-800 text-gray-300' }}">
                                    {{ $topicNames[$question->topic->title] ?? $question->topic->title }}
                                </span>

                                <h3 class="text-lg font-semibold text-white mb-3">
                                    {!! $question->title !!}
                                </h3>
                            </div>

                            @if(isset(auth()->user()['is_admin']) && auth()->user()['is_admin'] == true)
                                <div class="flex space-x-2 ml-4">
                                    <a href="/admin/questions/{{ $question->id }}/edit"
                                       class="bg-gray-800 hover:bg-gray-700 text-white px-3 py-1 rounded text-sm transition-colors">
                                        Редактировать
                                    </a>
                                    <form action="/admin/questions/{{ $question->id }}" method="POST" class="inline"
                                          onsubmit="return confirm('Удалить вопрос?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-900 hover:bg-red-800 text-red-300 px-3 py-1 rounded text-sm transition-colors">
                                            Удалить
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>


                        <div class="flex items-center justify-between">
                            <button onclick="showAnswer('{{ $question->id }}')"
                                    class="flex items-center space-x-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors">
                                <span>Показать ответ</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>

                        </div>


                        <div id="answer-content-{{ $question->id }}"
                             class="hidden mt-4 p-4 bg-black border border-white/10 rounded-xl">
                            @if(isset($question->shortAnswer) && $question->shortAnswer)
                                <div class="text-gray-300 mb-4">
                                    {!! nl2br($question->shortAnswer) !!}
                                </div>
                            @endif

                            <div class="flex justify-end">
                                <a href="/questions/{{ $question->id }}"
                                   class="inline-flex items-center space-x-2 bg-white text-black px-4 py-2 rounded-lg hover:bg-gray-200 transition-colors">
                                    <span>Подробный ответ</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="bg-black border border-white/10 rounded-2xl p-12 text-center">
                        <div class="w-16 h-16 bg-gray-800 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <span class="text-white text-2xl">?</span>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-2">Вопросов пока нет</h3>
                        <p class="text-gray-400">Добавьте первый вопрос</p>
                    </div>
                @endforelse
            </div>


            @if(method_exists($questions, 'links'))
                <div class="mt-12 flex justify-center">
                    {{ $questions->appends(request()->query())->links() }}
                </div>
            @endif
        </div>
    </section>

    <script>
        function showAnswer(questionId) {
            const content = document.getElementById(`answer-content-${questionId}`);
            const button = event.target.closest('button');
            const icon = button.querySelector('svg');

            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                button.querySelector('span').textContent = 'Скрыть ответ';
                icon.style.transform = 'rotate(180deg)';
            } else {
                content.classList.add('hidden');
                button.querySelector('span').textContent = 'Показать ответ';
                icon.style.transform = 'rotate(0deg)';
            }
        }
    </script>
</x-layout>
