<x-layout>
    <section class="relative overflow-hidden bg-black py-16">
        <div class="relative max-w-7xl mx-auto px-6 text-center">
            <h1 class="text-4xl sm:text-5xl font-extrabold text-white tracking-tight">
                Тесты по PHP
            </h1>
            <p class="text-gray-400 text-lg mt-4">
                Пройди тестирование и узнай свой уровень знаний PHP, Laravel и баз данных.
            </p>
        </div>
    </section>

    <section class="py-8 bg-black min-h-screen overflow-hidden">
        <div class="max-w-4xl mx-auto px-6">

            <div class="bg-black border border-white/10 rounded-2xl p-8">
                <form id="testForm" action="" method="GET" class="space-y-8">
                    <div>
                        <h2 class="text-xl font-semibold text-white mb-6">
                            Выбери тему тестирования
                        </h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                            <label class="test-topic-card cursor-pointer">
                                <input type="radio" name="topic" value="mixed" class="sr-only" checked>
                                <div class="bg-black border border-white/10 rounded-xl p-8 flex items-center justify-center h-32 transition-colors">
                                    <span class="text-white font-bold text-2xl">Смешанный</span>
                                </div>
                            </label>

                            <label class="test-topic-card cursor-pointer">
                                <input type="radio" name="topic" value="php" class="sr-only">
                                <div class="bg-black border border-white/10 rounded-xl p-8 flex items-center justify-center h-32 transition-colors">
                                    <span class="text-white font-bold text-2xl">PHP</span>
                                </div>
                            </label>

                            <label class="test-topic-card cursor-pointer">
                                <input type="radio" name="topic" value="laravel" class="sr-only">
                                <div class="bg-black border border-white/10 rounded-xl p-8 flex items-center justify-center h-32 transition-colors">
                                    <span class="text-white font-bold text-2xl">Laravel</span>
                                </div>
                            </label>

                            <label class="test-topic-card cursor-pointer">
                                <input type="radio" name="topic" value="sql" class="sr-only">
                                <div class="bg-black border border-white/10 rounded-xl p-8 flex items-center justify-center h-32 transition-colors">
                                    <span class="text-white font-bold text-2xl">SQL</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold text-white mb-6">
                            Количество вопросов
                        </h3>

                        <div class="flex items-center justify-center space-x-4">
                            <button type="button" id="decreaseCount" class="w-12 h-12 bg-black border border-white/30 hover:border-white/50 rounded-xl flex items-center justify-center transition-colors">
                                <span class="text-white text-xl font-bold">−</span>
                            </button>

                            <div class="bg-black border border-white/30 rounded-xl px-8 py-4">
                                <div id="questionCount" class="text-3xl font-bold text-white text-center">10</div>
                            </div>

                            <button type="button" id="increaseCount" class="w-12 h-12 bg-black border border-white/30 hover:border-white/50 rounded-xl flex items-center justify-center transition-colors">
                                <span class="text-white text-xl font-bold">+</span>
                            </button>

                            <input type="hidden" name="count" id="countInput" value="10">
                        </div>
                    </div>

                    <div class="pt-8">
                        <button type="submit" class="w-full bg-white text-black font-semibold py-3 px-6 rounded-xl hover:bg-gray-200 transition-colors">
                            Начать тестирование
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </section>

    <script>
        let currentCount = 10;
        const minCount = 5;
        const maxCount = 30;

        const questionCountDisplay = document.getElementById('questionCount');
        const countInput = document.getElementById('countInput');
        const decreaseBtn = document.getElementById('decreaseCount');
        const increaseBtn = document.getElementById('increaseCount');
        const form = document.getElementById('testForm');

        function updateCount(newCount) {
            currentCount = Math.max(minCount, Math.min(maxCount, newCount));
            questionCountDisplay.textContent = currentCount;
            countInput.value = currentCount;

            decreaseBtn.style.opacity = currentCount <= minCount ? '0.5' : '1';
            increaseBtn.style.opacity = currentCount >= maxCount ? '0.5' : '1';
        }

        decreaseBtn.addEventListener('click', () => updateCount(currentCount - 5));
        increaseBtn.addEventListener('click', () => updateCount(currentCount + 5));

        form.addEventListener('submit', function(e) {
            const selectedTopic = document.querySelector('input[name="topic"]:checked').value;
            this.action = `/tests/${selectedTopic}`;
        });

        document.querySelectorAll('input[name="topic"]').forEach(radio => {
            radio.addEventListener('change', function() {
                document.querySelectorAll('.test-topic-card > div').forEach(card => {
                    card.classList.remove('border-white/30');
                    card.classList.add('border-white/10');
                });

                const selectedCard = this.closest('.test-topic-card').querySelector('div');
                selectedCard.classList.add('border-white/30');
                selectedCard.classList.remove('border-white/10');
            });
        });

        document.addEventListener('DOMContentLoaded', () => {
            const mixedCard = document.querySelector('input[value="mixed"]').closest('.test-topic-card').querySelector('div');
            mixedCard.classList.add('border-white/30');
            mixedCard.classList.remove('border-white/10');

            updateCount(currentCount);
        });
    </script>
</x-layout>
