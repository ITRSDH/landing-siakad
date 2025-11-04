<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Exception;

class GaleriApiService
{
    protected $apiUrl;
    protected $timeout;

    public function __construct()
    {
        $this->apiUrl = rtrim(config('app.api_url'), '/');
        $this->timeout = 30; // 30 seconds timeout
    }

    /**
     * Get all Galeri data from API
     */
    public function getAllGaleri()
    {
        try {
            $response = Http::timeout($this->timeout)
                ->get($this->apiUrl . '/galeri');

            if ($response->successful()) {
                $data = $response->json();
                
                // Handle different API response structures
                if (isset($data['data'])) {
                    return collect($data['data'])->map(function($item) {
                        return ensure_galeri_object($item);
                    });
                } elseif (isset($data['galeri'])) {
                    return collect($data['galeri'])->map(function($item) {
                        return ensure_galeri_object($item);
                    });
                } else {
                    return collect($data)->map(function($item) {
                        return ensure_galeri_object($item);
                    });
                }
            }

            Log::warning('API Galeri returned non-successful status: ' . $response->status());
            return null;

        } catch (Exception $e) {
            Log::error('API Galeri Error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Get specific Galeri by ID from API
     */
    public function getGaleriById($id)
    {
        try {
            $response = Http::timeout($this->timeout)
                ->get($this->apiUrl . '/galeri/' . $id);

            if ($response->successful()) {
                $data = $response->json();
                
                // Handle different API response structures
                if (isset($data['data'])) {
                    return ensure_galeri_object($data['data']);
                } elseif (isset($data['galeri'])) {
                    return ensure_galeri_object($data['galeri']);
                } else {
                    return ensure_galeri_object($data);
                }
            }

            Log::warning('API Galeri detail returned non-successful status: ' . $response->status());
            return null;

        } catch (Exception $e) {
            Log::error('API Galeri Detail Error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Test API connection
     */
    public function testConnection()
    {
        try {
            $response = Http::timeout(10)->get($this->apiUrl . '/galeri');

            return [
                'success' => $response->successful(),
                'status' => $response->status(),
                'response_time' => $response->transferStats->getTransferTime() ?? 0,
                'url' => $this->apiUrl . '/galeri'
            ];

        } catch (Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage(),
                'url' => $this->apiUrl . '/galeri'
            ];
        }
    }
}