<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class TestController extends Controller
{

    public function index()
    {
        return view('tests.index');
    }

    public function show(Request $request)
    {
        $allowedTopics = Topic::pluck('title', 'id')->toArray();

        $topic = $request->query('topic', 'mixed');
        $count = (int)$request->query('count', 10);

        if (!in_array($topic, $allowedTopics) || $count > 30 || $count < 5) {
            return redirect('/tests');
        }

        $topicId = array_search($topic, $allowedTopics);

        $questionsQuery = Question::query();

        if ($topic !== 'mixed') {
            $questionsQuery->where('topic_id', $topicId);
        }

        $questions = $questionsQuery->inRandomOrder()->limit($count)->get();

        return view('tests.show', [
            'questions' => $questions,
            'topic' => $topic,
            'count' => $count,
        ]);
    }

    public function submit(Request $request)
    {
        $results = json_decode($request->input('results', '[]'), true);

        $correct = 0;
        $failed = 0;

        foreach ($results as $result) {
            $result['know'] ? $correct++ : $failed++;
        }

        $questionIds = array_column($results, 'id');
        $questions = Question::whereIn('id', $questionIds)->get();

        $answersMap = collect($results)->pluck('know', 'id');

        $questionsWithAnswers = $questions->map(function ($q) use ($answersMap) {
            $q->know = $answersMap[$q->id] ?? false;
            return $q;
        });

        return view('tests.results', [
            'questions' => $questionsWithAnswers,
            'correct' => $correct,
            'failed' => $failed,
        ]);
    }


}
