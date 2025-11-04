<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Exception;

class OrmawaApiService
{
    protected $apiUrl;
    protected $timeout;

    public function __construct()
    {
        $this->apiUrl = rtrim(config('app.api_url'), '/');
        $this->timeout = 30; // 30 seconds timeout
    }

    /**
     * Get all Ormawa data from API
     */
    public function getAllOrmawa()
    {
        try {
            $response = Http::timeout($this->timeout)
                ->get($this->apiUrl . '/ormawa');

            if ($response->successful()) {
                $data = $response->json();
                
                // Handle different API response structures
                if (isset($data['data'])) {
                    return collect($data['data'])->map(function($item) {
                        return ensure_ormawa_object($item);
                    });
                } elseif (isset($data['ormawa'])) {
                    return collect($data['ormawa'])->map(function($item) {
                        return ensure_ormawa_object($item);
                    });
                } else {
                    return collect($data)->map(function($item) {
                        return ensure_ormawa_object($item);
                    });
                }
            }

            Log::warning('API Ormawa returned non-successful status: ' . $response->status());
            return null;

        } catch (Exception $e) {
            Log::error('API Ormawa Error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Get specific Ormawa by ID from API
     */
    public function getOrmawaById($id)
    {
        try {
            $response = Http::timeout($this->timeout)
                ->get($this->apiUrl . '/ormawa/' . $id);

            if ($response->successful()) {
                $data = $response->json();
                
                // Handle different API response structures
                if (isset($data['data'])) {
                    return ensure_ormawa_object($data['data']);
                } elseif (isset($data['ormawa'])) {
                    return ensure_ormawa_object($data['ormawa']);
                } else {
                    return ensure_ormawa_object($data);
                }
            }

            Log::warning('API Ormawa detail returned non-successful status: ' . $response->status());
            return null;

        } catch (Exception $e) {
            Log::error('API Ormawa Detail Error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Test API connection
     */
    public function testConnection()
    {
        try {
            $response = Http::timeout(10)->get($this->apiUrl . '/ormawa');
            
            return [
                'success' => $response->successful(),
                'status' => $response->status(),
                'response_time' => $response->transferStats->getTransferTime() ?? 0,
                'url' => $this->apiUrl . '/ormawa'
            ];

        } catch (Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage(),
                'url' => $this->apiUrl . '/ormawa'
            ];
        }
    }
}