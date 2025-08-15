<x-layout>

    <section class="relative overflow-hidden bg-black py-12">
        <div class="relative max-w-7xl mx-auto px-6">

            <div class="mb-6">
                <a href="/questions" class="inline-flex items-center text-gray-400 hover:text-white transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Вернуться к вопросам
                </a>
            </div>

            <div class="max-w-4xl mx-auto">
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

                <div class="mb-6">
                        <span class="inline-block px-4 py-2 rounded-full text-sm font-medium {{ $topicColors[$question->topic->title] ?? 'bg-gray-800 text-gray-300' }}">
                            {{ $topicNames[$question->topic->title] ?? $question->topic->title }}
                        </span>
                </div>

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight leading-tight mb-8">
                    {!! $question->title !!}
                </h1>

                @if(isset($question->description) && $question->description)
                    <div class="bg-white/5 border border-white/10 rounded-2xl p-6 backdrop-blur-sm">
                        <div class="flex items-start space-x-3">
                            <div class="flex-shrink-0 mt-1">
                                <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray-300 leading-relaxed text-sm">
                                    {!! $question->description !!}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section class="py-12 bg-black min-h-screen">
        <div class="max-w-4xl mx-auto px-6">

            <div class="mb-8">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-white">Краткий ответ</h2>

                    @if(isset(auth()->user()->is_admin) && auth()->user()->is_admin == true)
                        <div class="flex space-x-2">
                            <a href="/admin/questions/{{ $question->id }}/edit"
                               class="bg-gray-800 hover:bg-gray-700 text-white px-4 py-2 rounded-lg text-sm transition-colors">
                                Редактировать
                            </a>

                            <form action="/admin/questions/{{ $question->id }}" method="POST" class="inline"
                                  onsubmit="return confirm('Удалить вопрос?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-900 hover:bg-red-800 text-red-300 px-4 py-2 rounded-lg text-sm transition-colors">
                                    Удалить
                                </button>
                            </form>
                        </div>
                    @endif
                </div>

                <div class="bg-black border border-white/10 rounded-2xl p-6">
                    @if(isset($question->shortAnswer) && $question->shortAnswer)
                        <div class="text-gray-300 leading-relaxed">
                            {!! nl2br($question->shortAnswer) !!}
                        </div>
                    @else
                        <div class="text-gray-500 italic">
                            Краткий ответ не добавлен
                        </div>
                    @endif
                </div>
            </div>

            <div class="mb-8">
                <div class="mb-4">
                    <h2 class="text-xl font-semibold text-white">Подробный ответ</h2>
                </div>

                <div class="bg-black border border-white/10 rounded-2xl p-6">
                    @if(isset($question->longAnswer) && $question->longAnswer)
                        <div class="text-gray-300 leading-relaxed prose prose-invert max-w-none long-answer-content">
                            {!! nl2br($question->longAnswer)!!}
                        </div>
                    @else
                        <div class="text-gray-500 italic">
                            Подробный ответ не добавлен
                        </div>
                    @endif
                </div>
            </div>
            <div class="flex justify-between items-center pt-8">
            </div>


        </div>
    </section>


</x-layout>
