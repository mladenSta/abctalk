<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TopicController extends Controller
{
    public function index(){
        $topics = Topic::all();

        return Inertia::render('Topics/Index', [
            'topics' => $topics,
        ]);

    }

    public function create(){
        return Inertia::render('Topics/Form');
    }

    public function store(Request $request){
        $topic = new Topic;
        $topic->name = $request->name;
        $topic->user_id = auth()->user()->id;
        $topic->save();

        return redirect()
            ->route('topics')
            ->with('success', 'Topic created.');


    }
}
