<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Exception;

class BeasiswaApiService
{
    protected $apiUrl;
    protected $timeout;

    public function __construct()
    {
        $this->apiUrl = rtrim(config('app.api_url'), '/');
        $this->timeout = 30; // 30 seconds timeout
    }

    /**
     * Get all Beasiswa data from API
     */
    public function getAllBeasiswa()
    {
        try {
            $response = Http::timeout($this->timeout)
                ->get($this->apiUrl . '/beasiswa');

            if ($response->successful()) {
                $data = $response->json();
                
                // Handle different API response structures
                if (isset($data['data'])) {
                    return collect($data['data'])->map(function($item) {
                        return ensure_beasiswa_object($item);
                    });
                } elseif (isset($data['beasiswa'])) {
                    return collect($data['beasiswa'])->map(function($item) {
                        return ensure_beasiswa_object($item);
                    });
                } else {
                    return collect($data)->map(function($item) {
                        return ensure_beasiswa_object($item);
                    });
                }
            }

            Log::warning('API Beasiswa returned non-successful status: ' . $response->status());
            return null;

        } catch (Exception $e) {
            Log::error('API Beasiswa Error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Get specific Beasiswa by ID from API
     */
    public function getBeasiswaById($id)
    {
        try {
            $response = Http::timeout($this->timeout)
                ->get($this->apiUrl . '/beasiswa/' . $id);

            if ($response->successful()) {
                $data = $response->json();
                
                // Handle different API response structures
                if (isset($data['data'])) {
                    return ensure_beasiswa_object($data['data']);
                } elseif (isset($data['beasiswa'])) {
                    return ensure_beasiswa_object($data['beasiswa']);
                } else {
                    return ensure_beasiswa_object($data);
                }
            }

            Log::warning('API Beasiswa detail returned non-successful status: ' . $response->status());
            return null;

        } catch (Exception $e) {
            Log::error('API Beasiswa Detail Error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Test API connection
     */
    public function testConnection()
    {
        try {
            $response = Http::timeout(10)->get($this->apiUrl . '/beasiswa');
            
            return [
                'success' => $response->successful(),
                'status' => $response->status(),
                'response_time' => $response->transferStats->getTransferTime() ?? 0,
                'url' => $this->apiUrl . '/beasiswa'
            ];

        } catch (Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage(),
                'url' => $this->apiUrl . '/beasiswa'
            ];
        }
    }
}