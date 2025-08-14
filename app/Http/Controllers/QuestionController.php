<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Mews\Purifier\Facades\Purifier;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
        $topics = Topic::pluck('title', 'id')->toArray();
        $sort = $request->query('sort');
        $topicId = array_search($sort, $topics);
        if ($topicId !== false) {
            $questions = Question::where('topic_id', $topicId)
                ->orderBy('id', 'desc')
                ->paginate(10);
        } else {
            $questions = Question::orderBy('id', 'desc')->paginate(10);
        }

        return view('questions.index', [
            'questions' => $questions,
            'topics' => $topics,
            'currentSort' => $sort,
        ]);
    }

    public function show($id)
    {
        $question = Question::findOrFail($id);
        return view('questions.show', ['question' => $question]);
    }


    public function create()
    {
        return view('questions.create');
    }

    public function store(Request $request)
    {
        $availableTopics = Topic::pluck('title')->toArray();

        $validated = $request->validate([
            'title' => 'required|string|min:5',
            'topic' => ['required', Rule::in($availableTopics)],
            'description' => 'nullable|string',
            'shortAnswer' => 'nullable|string',
            'longAnswer' => 'nullable|string',
        ]);

        $topicId = Topic::where('title', $validated['topic'])->value('id');

        Question::create([
            'title' => Purifier::clean($validated['title']),
            'description' => Purifier::clean($validated['description']) ?? null,
            'shortAnswer' => Purifier::clean($validated['shortAnswer']) ?? null,
            'longAnswer' => Purifier::clean($validated['longAnswer']) ?? null,
            'topic_id' => $topicId,
        ]);

        return redirect('/questions')->with('success', 'Вопрос успешно добавлен');
    }

    public function edit($id)
    {
        $question = Question::findOrFail($id);
        return view('questions.edit', ['question' => $question]);
    }

    public function update(Request $request, $id)
    {
        $question = Question::findOrFail($id);

        $availableTopics = Topic::pluck('title')->toArray();
        $validated = $request->validate([
            'title' => 'required|string|min:5',
            'topic' => ['required', Rule::in($availableTopics)],
            'description' => 'nullable|string',
            'shortAnswer' => 'nullable|string',
            'longAnswer' => 'nullable|string',
        ]);

        $topicId = Topic::where('title', $validated['topic'])->value('id');

        $question->update([
            'title' => Purifier::clean($validated['title']),
            'description' => Purifier::clean($validated['description']) ?? null,
            'shortAnswer' => Purifier::clean($validated['shortAnswer']) ?? null,
            'longAnswer' => Purifier::clean($validated['longAnswer']) ?? null,
            'topic_id' => $topicId,
        ]);

        return redirect('/questions')->with('success', 'Вопрос успешно обновлен');
    }

    public function destroy($id)
    {
        Question::destroy($id);
        return redirect('/questions');
    }
}
