<x-layout>
    <section class="relative overflow-hidden bg-black py-16 bg-cover bg-center bg-no-repeat">
        <div class="relative max-w-7xl mx-auto px-6 sm:px-12 lg:px-16 text-center">
            <div class="space-y-6 max-w-4xl mx-auto">
                <h1 class="text-4xl sm:text-5xl font-extrabold text-white tracking-tight select-none drop-shadow-lg">
                    Управление вопросами
                </h1>
                <p class="text-gray-400 text-lg">Создавайте и редактируйте вопросы для тестирования</p>
            </div>
        </div>
    </section>
    <section class="py-12 bg-black min-h-screen">
        <div class="max-w-6xl mx-auto px-6 sm:px-12 lg:px-16">

            <div class="bg-black border border-gray-800 rounded-2xl p-10 shadow-md">
                <form action="/admin/questions" method="POST" class="space-y-8" id="question-form">
                    @csrf

                    <div>
                        <label class="block text-white text-lg font-semibold mb-4">Топик</label>
                        <div class="grid grid-cols-3 gap-4">
                            <label
                                class="topic-option bg-gray-900 border border-gray-700 rounded-xl p-4 cursor-pointer hover:border-white transition-all">
                                <input type="radio" name="topic" value="php" class="hidden" required>
                                <div class="flex items-center justify-center mb-3">
                                    <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center">
                                        <span class="text-black font-bold">PHP</span>
                                    </div>
                                </div>
                                <div class="text-center text-gray-300 font-medium">Основы PHP</div>
                            </label>
                            <label
                                class="topic-option bg-gray-900 border border-gray-700 rounded-xl p-4 cursor-pointer hover:border-white transition-all">
                                <input type="radio" name="topic" value="laravel" class="hidden" required>
                                <div class="flex items-center justify-center mb-3">
                                    <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center">
                                        <span class="text-black font-bold text-sm">LRV</span>
                                    </div>
                                </div>
                                <div class="text-center text-gray-300 font-medium">Laravel Framework</div>
                            </label>
                            <label
                                class="topic-option bg-gray-900 border border-gray-700 rounded-xl p-4 cursor-pointer hover:border-white transition-all">
                                <input type="radio" name="topic" value="sql" class="hidden" required>
                                <div class="flex items-center justify-center mb-3">
                                    <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center">
                                        <span class="text-black font-bold">SQL</span>
                                    </div>
                                </div>
                                <div class="text-center text-gray-300 font-medium">Базы данных</div>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label for="title" class="block text-white text-lg font-semibold mb-4">Вопрос</label>
                        <textarea id="title" name="title" rows="3" required
                                  class="w-full bg-gray-900 border border-gray-700 rounded-xl px-4 py-3 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-white focus:border-transparent transition-all resize-none"
                                  placeholder="Введите текст вопроса..."></textarea>
                    </div>

                    <div>
                        <label for="description" class="block text-white text-lg font-semibold mb-4">Описание</label>
                        <textarea id="description" name="description" rows="2"
                                  class="w-full bg-gray-900 border border-gray-700 rounded-xl px-4 py-3 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-white focus:border-transparent transition-all resize-none"
                                  placeholder="Введите что проверяет вопрос..."></textarea>
                    </div>

                    <div>
                        <label for="shortAnswer" class="block text-white text-lg font-semibold mb-4">Краткий ответ</label>
                        <textarea id="shortAnswer" name="shortAnswer" rows="4"
                                  class="w-full bg-gray-900 border border-gray-700 rounded-xl px-4 py-3 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-white focus:border-transparent transition-all resize-none"
                                  placeholder="Введите краткий ответ на вопрос..."></textarea>
                    </div>

                    <div>
                        <label for="longAnswer" class="block text-white text-lg font-semibold mb-4">Подробный ответ</label>
                        <textarea id="longAnswer" name="longAnswer" rows="8"
                                  class="w-full bg-gray-900 border border-gray-700 rounded-xl px-4 py-3 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-white focus:border-transparent transition-all resize-none"
                                  placeholder="Введите подробный ответ с объяснениями и примерами..."></textarea>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 justify-end">
                        <button type="button" id="preview-btn"
                                class="bg-gray-800 hover:bg-gray-700 text-white px-8 py-4 rounded-xl font-semibold transition-all transform hover:scale-105">
                            Предварительный просмотр
                        </button>
                        <button type="submit"
                                class="bg-white hover:bg-gray-200 shadow-lg text-black px-10 py-4 rounded-xl font-semibold tracking-wide transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-white focus:ring-opacity-50 transition-all">
                            Создать вопрос
                        </button>
                    </div>
                </form>
            </div>

            <div id="preview-modal"
                 class="hidden fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 p-4">
                <div
                    class="bg-black border border-gray-800 rounded-2xl p-8 max-w-4xl w-full max-h-[80vh] overflow-y-auto">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-semibold text-white">Предварительный просмотр</h3>
                        <button id="close-preview" class="text-gray-400 hover:text-white text-2xl">×</button>
                    </div>

                    <div id="preview-content">

                    </div>

                    <div class="flex justify-end mt-6">
                        <button id="close-preview-btn"
                                class="bg-gray-800 hover:bg-gray-700 text-white px-6 py-3 rounded-xl font-semibold transition-all">
                            Закрыть
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.querySelectorAll('.topic-option').forEach(option => {
            option.addEventListener('click', function () {
                document.querySelectorAll('.topic-option').forEach(opt => {
                    opt.classList.remove('border-white', 'bg-gray-800');
                    opt.classList.add('border-gray-700', 'bg-gray-900');
                });
                this.classList.remove('border-gray-700', 'bg-gray-900');
                this.classList.add('border-white', 'bg-gray-800');
            });
        });

        document.getElementById('preview-btn').addEventListener('click', function () {
            const form = document.getElementById('question-form');
            const formData = new FormData(form);

            const title = formData.get('title');
            const topic = formData.get('topic');
            const description = formData.get('description');
            const shortAnswer = formData.get('shortAnswer');
            const longAnswer = formData.get('longAnswer');

            if (!title || !topic) {
                alert('Пожалуйста, заполните обязательные поля: топик и вопрос');
                return;
            }

            const topicColors = {
                'php': 'bg-blue-900 text-blue-300',
                'laravel': 'bg-red-900 text-red-300',
                'sql': 'bg-green-900 text-green-300'
            };

            const topicNames = {
                'php': 'PHP',
                'laravel': 'Laravel',
                'sql': 'Базы данных'
            };

            const previewContent = `
                <div class="mb-8">
                    <span class="inline-block px-4 py-2 rounded-full text-sm font-medium mb-6 ${topicColors[topic]}">
                        ${topicNames[topic]}
                    </span>
                    <h1 class="text-2xl font-bold text-white mb-4 leading-relaxed">${title}</h1>
                    ${description ? `<p class="text-gray-400 text-lg leading-relaxed">${description}</p>` : ''}
                </div>

                ${shortAnswer ? `
                    <div class="mb-8">
                        <h2 class="text-xl font-semibold text-white mb-4">Краткий ответ</h2>
                        <div class="bg-gray-900 border border-gray-700 rounded-xl p-4">
                            <div class="text-gray-300 leading-relaxed">${shortAnswer.replace(/\n/g, '<br>')}</div>
                        </div>
                    </div>
                ` : ''}

                ${longAnswer ? `
                    <div class="mb-8">
                        <h2 class="text-xl font-semibold text-white mb-4">Подробный ответ</h2>
                        <div class="bg-gray-900 border border-gray-700 rounded-xl p-4">
                            <div class="text-gray-300 leading-relaxed">${longAnswer.replace(/\n/g, '<br>')}</div>
                        </div>
                    </div>
                ` : ''}
            `;

            document.getElementById('preview-content').innerHTML = previewContent;
            document.getElementById('preview-modal').classList.remove('hidden');
        });

        document.getElementById('close-preview').addEventListener('click', function () {
            document.getElementById('preview-modal').classList.add('hidden');
        });

        document.getElementById('close-preview-btn').addEventListener('click', function () {
            document.getElementById('preview-modal').classList.add('hidden');
        });

        document.getElementById('preview-modal').addEventListener('click', function (e) {
            if (e.target === this) {
                this.classList.add('hidden');
            }
        });
    </script>
</x-layout>
