<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Topic;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MessageController extends Controller
{
    public function index($topic_id){
        $messages = Message::with('user')->where('topic_id', $topic_id)->get();
        $topic = Topic::find($topic_id);

        return Inertia::render('Messages/Index', [
            'topic' => $topic,
            'messages' => $messages,
        ]);

    }

    public function store(Request $request){
        $message = new Message;
        $message->content = $request->content;
        $message->user_id = auth()->user()->id;
        $message->topic_id = $request->topic_id;
        $message->save();

        /*
        return redirect()
            ->route('topics')
            ->with('success', 'Topic created.');
        */

    }
}
