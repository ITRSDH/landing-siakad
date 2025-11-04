<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Exception;

class BeritaApiService
{
    protected $apiUrl;
    protected $timeout;

    public function __construct()
    {
        $this->apiUrl = rtrim(config('app.api_url'), '/');
        $this->timeout = 30; // 30 seconds timeout
    }

    /**
     * Get all Berita data from API
     */
    public function getAllBerita()
    {
        try {
            $response = Http::timeout($this->timeout)
                ->get($this->apiUrl . '/berita');

            if ($response->successful()) {
                $data = $response->json();
                
                // Handle different API response structures
                if (isset($data['data'])) {
                    return collect($data['data'])->map(function($item) {
                        return ensure_berita_object($item);
                    });
                } elseif (isset($data['berita'])) {
                    return collect($data['berita'])->map(function($item) {
                        return ensure_berita_object($item);
                    });
                } else {
                    return collect($data)->map(function($item) {
                        return ensure_berita_object($item);
                    });
                }
            }

            Log::warning('API Berita returned non-successful status: ' . $response->status());
            return null;

        } catch (Exception $e) {
            Log::error('API Berita Error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Get specific Berita by ID from API
     */
    public function getBeritaById($id)
    {
        try {
            $response = Http::timeout($this->timeout)
                ->get($this->apiUrl . '/berita/' . $id);

            if ($response->successful()) {
                $data = $response->json();
                
                // Handle different API response structures
                if (isset($data['data'])) {
                    return ensure_berita_object($data['data']);
                } elseif (isset($data['berita'])) {
                    return ensure_berita_object($data['berita']);
                } else {
                    return ensure_berita_object($data);
                }
            }

            Log::warning('API Berita detail returned non-successful status: ' . $response->status());
            return null;

        } catch (Exception $e) {
            Log::error('API Berita Detail Error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Test API connection
     */
    public function testConnection()
    {
        try {
            $response = Http::timeout(10)->get($this->apiUrl . '/berita');

            return [
                'success' => $response->successful(),
                'status' => $response->status(),
                'response_time' => $response->transferStats->getTransferTime() ?? 0,
                'url' => $this->apiUrl . '/berita'
            ];

        } catch (Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage(),
                'url' => $this->apiUrl . '/berita'
            ];
        }
    }
}