<?php

namespace App\Console\Commands;

use App\Models\Question;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class QuestionsLoad extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
        protected $signature = 'app:yeahub-questions-load';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // skill => topic_id
        $skills = [
            40 => 1, // PHP
            41 => 2, // Laravel
            47 => 3, // SQL
        ];

        $baseUrl = 'https://api.yeahub.ru/questions/public-questions';
        $page = 1;
        $limit = 999;
        $specialization = 24;

        $count = 0;

        foreach ($skills as $skill => $topicId) {
            $url = "{$baseUrl}?page={$page}&limit={$limit}&skillFilterMode=ANY&skills={$skill}&specialization={$specialization}";

            $response = Http::get($url);

            if (!$response->successful()) {
                $this->error("Ошибка при запросе к API для skill={$skill}: " . $response->status());
                continue;
            }

            $data = $response->json();

            if (!isset($data['data'])) {
                $this->error("Некорректный ответ API для skill={$skill}");
                continue;
            }

            foreach ($data['data'] as $item) {
                $exists = Question::where('title', $item['title'])->exists();
                if (!$exists) {
                    Question::create([
                        'title' => $item['title'],
                        'shortAnswer' => $item['shortAnswer'],
                        'longAnswer' => $item['longAnswer'],
                        'description' => $item['description'],
                        'topic_id' => $topicId,
                    ]);
                    $count++;
                }
            }
        }

        $this->info("Добавлено вопросов: $count");

        return 0;
    }
}
