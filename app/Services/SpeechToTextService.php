<?php

namespace App\Services;

use Google\Cloud\Speech\V1\SpeechClient;
use Google\Cloud\Speech\V1\RecognitionAudio;
use Google\Cloud\Speech\V1\RecognitionConfig;
use Google\Cloud\Speech\V1\RecognitionConfig\AudioEncoding;

class SpeechToTextService
{
    protected $client;

    public function __construct()
    {
        $this->client = new SpeechClient([
            'credentials' => config('services.google.credentials')
        ]);
    }

    /**
     * Transcribe audio file to text
     * 
     * @param string $audioContent Base64 encoded audio
     * @param string $languageCode Language code (e.g., 'tl-PH' for Tagalog Philippines)
     * @return string Transcribed text
     */
    public function transcribe($audioContent, $languageCode = 'tl-PH')
    {
        // Decode base64 audio
        $audio = base64_decode($audioContent);

        // Configure recognition
        $config = new RecognitionConfig([
            'encoding' => AudioEncoding::WEBM_OPUS, // or LINEAR16 for WAV
            'sample_rate_hertz' => 48000,
            'language_code' => $languageCode,
            'enable_automatic_punctuation' => false,
            'model' => 'default', // or 'command_and_search' for short audio
        ]);

        $recognitionAudio = new RecognitionAudio([
            'content' => $audio,
        ]);

        // Perform recognition
        $response = $this->client->recognize($config, $recognitionAudio);

        // Get transcription
        $transcription = '';
        foreach ($response->getResults() as $result) {
            $alternatives = $result->getAlternatives();
            if (count($alternatives) > 0) {
                $transcription = $alternatives[0]->getTranscript();
                break;
            }
        }

        return trim($transcription);
    }

    public function __destruct()
    {
        $this->client->close();
    }
}