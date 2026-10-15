<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        try {
            $history = $request->input('messages', []);
            $contents = [];

            foreach ($history as $message) {
                $role = $message['role'] ?? 'user';

                if (!in_array($role, ['user', 'assistant', 'model'])) {
                    continue;
                }

                $text = $message['content'] ?? '';

                if (!is_string($text) || trim($text) === '') {
                    continue;
                }

                $contents[] = [
                    'role' => in_array($role, ['assistant', 'model'])
                        ? 'model'
                        : 'user',
                    'parts' => [
                        ['text' => $text],
                    ],
                ];
            }

            $contents[] = [
                'role' => 'user',
                'parts' => [
                    ['text' => $request->message],
                ],
            ];

            $response = Http::withHeaders([
                'x-goog-api-key' => env('GEMINI_API_KEY'),
            ])->timeout(60)->post(
                'https://generativelanguage.googleapis.com/v1beta/models/gemini-3.5-flash-lite:generateContent',
                [
                    'systemInstruction' => [
                        'parts' => [[
                            'text' => 'You are Cinema AI Assistant. Help users discover and discuss movies. Give friendly, concise, and useful movie recommendations and information.'
                        ]],
                    ],
                    'contents' => $contents,
                    'generationConfig' => [
                        'maxOutputTokens' => 500,
                    ],
                ]
            );

            if (!$response->successful()) {
                Log::error('Gemini API Error', [
                    'status' => $response->status(),
                    'response' => $response->json(),
                ]);

                
return response()->json([
    'success' => false,
    'message' => data_get(
        $response->json(),
        'error.message',
        'Gemini API request failed.'
    ),
    'status' => $response->status(),
], 502);

            }

            $reply = data_get(
                $response->json(),
                'candidates.0.content.parts.0.text'
            );

            if (!$reply) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gemini returned an empty response.',
                ], 502);
            }

            return response()->json([
                'success' => true,
                'reply' => $reply,
            ]);

        } catch (\Throwable $e) {
            Log::error('Chatbot Error', [
                'exception' => $e->getMessage(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while contacting the AI.',
            ], 500);
        }
    }
}
