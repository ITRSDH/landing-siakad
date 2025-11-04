<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Exception;

class LandingApiService
{
    protected $apiUrl;
    protected $timeout;

    public function __construct()
    {
        $this->apiUrl = rtrim(config('app.api_url'), '/');
        $this->timeout = 30; // 30 seconds timeout
    }

    /**
     * Get Landing Kampus data from API
     * API dirancang untuk single data, jadi tidak perlu ID
     */
    public function getLandingKampus($id = null)
    {
        try {
            // Selalu gunakan endpoint utama karena API hanya mengembalikan satu data
            $url = $this->apiUrl . '/landing-content';
            Log::info('Attempting to fetch from URL: ' . $url);
            
            $response = Http::timeout($this->timeout)->get($url);

            Log::info('API Response Status: ' . $response->status());
            Log::info('API Response Body: ', $response->json());

            if ($response->successful()) {
                $data = $response->json();
                
                // Handle API response structure sesuai dengan controller API
                if (isset($data['data'])) {
                    Log::info('Using data from data key');
                    return ensure_profil_object($data['data']);
                } elseif (isset($data['success']) && $data['success'] && isset($data['data'])) {
                    Log::info('Using data from success.data key');
                    return ensure_profil_object($data['data']);
                } else {
                    Log::info('Using raw data');
                    return ensure_profil_object($data);
                }
            }

            Log::warning('API Profil Kampus returned non-successful status: ' . $response->status());
            return null;

        } catch (Exception $e) {
            Log::error('API Profil Kampus Error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Get profil kampus aktif (yang sedang digunakan)
     * Karena API hanya mengembalikan satu data, ini sama dengan getLandingKampus()
     */
    public function getActiveLandingKampus()
    {
        // Karena API sudah dirancang untuk single data, langsung ambil dari endpoint utama
        return $this->getLandingKampus();
    }

    /**
     * Test API connection
     */
    public function testConnection()
    {
        try {
            $response = Http::timeout(10)->get($this->apiUrl . '/profile-kampus');

            return [
                'success' => $response->successful(),
                'status' => $response->status(),
                'response_time' => $response->transferStats->getTransferTime() ?? 0,
                'url' => $this->apiUrl . '/profile-kampus',
                'response_preview' => $response->successful() ? 
                    (isset($response->json()['message']) ? $response->json()['message'] : 'Data available') : 
                    'No data'
            ];

        } catch (Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage(),
                'url' => $this->apiUrl . '/profile-kampus'
            ];
        }
    }
}