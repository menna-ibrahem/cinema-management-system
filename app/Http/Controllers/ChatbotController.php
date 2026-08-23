<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI;

class ChatbotController extends Controller
{
    public function chat(Request $request)
{
    $request->validate([
        'message' => 'required|string|max:1000',
    ]);

    try {

        $client = OpenAI::client(env('OPENAI_API_KEY'));

        $messages = $request->input('messages', []);

        $messages[] = [
            'role' => 'user',
            'content' => $request->message,
        ];

        $response = $client->chat()->create([
    'model' => 'gpt-4o-mini',
    'messages' => array_merge([
        [
            'role' => 'system',
            'content' => 'You are Cinema AI Assistant. You help users discover and discuss movies. Give friendly, concise, and useful movie recommendations and information.'
        ]
    ], $messages),
]);

        $reply = $response->choices[0]->message->content;

        return response()->json([
            'success' => true,
            'reply' => $reply,
        ]);

    } catch (\Throwable $e) {

        return response()->json([
            'success' => false,
            'message' => $e->getMessage(),
        ], 500);
    }
}
}
