<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SpeechToTextService;
use Illuminate\Support\Facades\Log;

class SpeechController extends Controller
{
    protected $speechService;

    public function __construct(SpeechToTextService $speechService)
    {
        $this->speechService = $speechService;
    }

    public function transcribe(Request $request)
    {
        Log::info('=== Speech API Called ===');
        Log::info('Request data: ', $request->all());
        
        try {
            $request->validate([
                'audio' => 'required|string',
                'language' => 'nullable|string',
            ]);

            Log::info('Validation passed');
            Log::info('Attempting transcription...');
            
            $transcription = $this->speechService->transcribe(
                $request->audio,
                $request->language ?? 'tl-PH'
            );
            
            Log::info('Transcription successful: ' . $transcription);

            return response()->json([
                'success' => true,
                'transcription' => $transcription,
            ]);

        } catch (\Google\Cloud\Core\Exception\GoogleException $e) {
            Log::error('Google Cloud Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'error' => 'Google Cloud Error: ' . $e->getMessage(),
            ], 500);
            
        } catch (\Exception $e) {
            Log::error('General Error: ' . $e->getMessage());
            Log::error('File: ' . $e->getFile());
            Log::error('Line: ' . $e->getLine());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ], 500);
        }
    }
}