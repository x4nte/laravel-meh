<x-layout>
    @php
        $topicNames = [
            'laravel' => 'Laravel',
            'php' => 'PHP',
            'sql' => 'SQL',
            'mixed' => 'Смешанный',
        ];
    @endphp

    <section class="relative overflow-hidden bg-black py-16">
        <div class="relative max-w-7xl mx-auto px-6 text-center">
            <h1 class="text-4xl sm:text-5xl font-extrabold text-white tracking-tight">
                Тест: {{ $topicNames[$topic] }}
            </h1>
            <p class="text-gray-400 text-lg mt-4">
                Вопросов: {{ $count }}
            </p>
        </div>
    </section>

    <section class="py-8 bg-black min-h-screen overflow-hidden">
        <div class="max-w-3xl mx-auto px-6">
            <div class="bg-black border border-white/10 rounded-2xl p-8">
                <div class="flex items-center justify-between mb-6">
                    <span class="text-sm text-gray-400">Вы знаете?</span>
                    <div class="text-gray-400 text-sm">
                        Вопрос <span id="currentIndex">1</span> из {{ count($questions) }}
                    </div>
                </div>

                <div id="questionBox" class="min-h-[88px] sm:min-h-[100px]">
                </div>

                <div class="flex gap-4 mt-8">
                    <button id="knowBtn"
                            class="flex-1 bg-green-600 hover:bg-green-500 text-white font-semibold py-3 px-6 rounded-xl transition-colors">
                        Знаю
                    </button>
                    <button id="dontKnowBtn"
                            class="flex-1 bg-red-600 hover:bg-red-500 text-white font-semibold py-3 px-6 rounded-xl transition-colors">
                        Не знаю
                    </button>
                </div>
            </div>
        </div>
    </section>

    <form id="resultForm" action="/tests/{{ $topic }}/submit" method="POST" class="hidden">
        @csrf
        <input type="hidden" name="results" id="resultsInput">
    </form>

    <script>
        const questions = @json($questions->map(fn($q) => [
            'id' => $q->id,
            'title' => $q->title
        ]));

        const total = questions.length;
        let index = 0;
        const results = [];

        const questionBox = document.getElementById('questionBox');
        const currentIndexSpan = document.getElementById('currentIndex');
        const knowBtn = document.getElementById('knowBtn');
        const dontKnowBtn = document.getElementById('dontKnowBtn');
        const resultForm = document.getElementById('resultForm');
        const resultsInput = document.getElementById('resultsInput');

        function renderQuestion(i) {
            currentIndexSpan.textContent = i + 1;
            const q = questions[i];

            questionBox.innerHTML = `<h2 id="qTitle" class="text-xl sm:text-2xl font-semibold text-white leading-snug break-words"></h2>`;
            const h2 = document.getElementById('qTitle');
            h2.textContent = q.title;
        }

        function nextQuestion(know) {
            results.push({ id: questions[index].id, know });
            index++;
            if (index < total) {
                renderQuestion(index);
            } else {
                finishTest();
            }
        }

        function finishTest() {
            resultsInput.value = JSON.stringify(results);
            resultForm.submit();
        }

        knowBtn.addEventListener('click', () => nextQuestion(true));
        dontKnowBtn.addEventListener('click', () => nextQuestion(false));

        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowRight' || e.key === 'Enter') nextQuestion(true);
            if (e.key === 'ArrowLeft') nextQuestion(false);
        });

        document.addEventListener('DOMContentLoaded', () => renderQuestion(index));
    </script>
</x-layout>
