<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Exception;

class PengumumanApiService
{
    protected $apiUrl;
    protected $timeout;

    public function __construct()
    {
        $this->apiUrl = rtrim(config('app.api_url'), '/');
        $this->timeout = 30; // 30 seconds timeout
    }

    /**
     * Get all Pengumuman data from API
     */
    public function getAllPengumuman()
    {
        try {
            $response = Http::timeout($this->timeout)
                ->get($this->apiUrl . '/pengumuman');

            if ($response->successful()) {
                $data = $response->json();
                
                // Handle different API response structures
                if (isset($data['data'])) {
                    return collect($data['data'])->map(function($item) {
                        return ensure_pengumuman_object($item);
                    });
                } elseif (isset($data['pengumuman'])) {
                    return collect($data['pengumuman'])->map(function($item) {
                        return ensure_pengumuman_object($item);
                    });
                } else {
                    return collect($data)->map(function($item) {
                        return ensure_pengumuman_object($item);
                    });
                }
            }

            Log::warning('API Pengumuman returned non-successful status: ' . $response->status());
            return null;

        } catch (Exception $e) {
            Log::error('API Pengumuman Error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Get specific Pengumuman by ID from API
     */
    public function getPengumumanById($id)
    {
        try {
            $response = Http::timeout($this->timeout)
                ->get($this->apiUrl . '/pengumuman/' . $id);

            if ($response->successful()) {
                $data = $response->json();
                
                // Handle different API response structures
                if (isset($data['data'])) {
                    return ensure_pengumuman_object($data['data']);
                } elseif (isset($data['pengumuman'])) {
                    return ensure_pengumuman_object($data['pengumuman']);
                } else {
                    return ensure_pengumuman_object($data);
                }
            }

            Log::warning('API Pengumuman detail returned non-successful status: ' . $response->status());
            return null;

        } catch (Exception $e) {
            Log::error('API Pengumuman Detail Error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Test API connection
     */
    public function testConnection()
    {
        try {
            $response = Http::timeout(10)->get($this->apiUrl . '/pengumuman');

            return [
                'success' => $response->successful(),
                'status' => $response->status(),
                'response_time' => $response->transferStats->getTransferTime() ?? 0,
                'url' => $this->apiUrl . '/pengumuman'
            ];

        } catch (Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage(),
                'url' => $this->apiUrl . '/pengumuman'
            ];
        }
    }
}