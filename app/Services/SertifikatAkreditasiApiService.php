<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Exception;

class SertifikatAkreditasiApiService
{
    protected $apiUrl;
    protected $timeout;

    public function __construct()
    {
        $this->apiUrl = rtrim(config('app.api_url'), '/');
        $this->timeout = 30; // 30 seconds timeout
    }

    /**
     * Get all Sertifikat Akreditasi data from API
     */
    public function getAllSertifikatAkreditasi()
    {
        try {
            $response = Http::timeout($this->timeout)
                ->get($this->apiUrl . '/sertifikat-akreditasi');
            if ($response->successful()) {
                $data = $response->json();
                
                // Handle different API response structures
                if (isset($data['data'])) {
                    return collect($data['data'])->map(function($item) {
                        return ensure_sertifikat_akreditasi_object($item);
                    });
                } elseif (isset($data['sertifikat_akreditasi'])) {
                    return collect($data['sertifikat_akreditasi'])->map(function($item) {
                        return ensure_sertifikat_akreditasi_object($item);
                    });
                } else {
                    return collect($data)->map(function($item) {
                        return ensure_sertifikat_akreditasi_object($item);
                    });
                }
            }

            Log::warning('API Sertifikat Akreditasi returned non-successful status: ' . $response->status());
            return null;

        } catch (Exception $e) {
            Log::error('API Sertifikat Akreditasi Error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Get specific Sertifikat Akreditasi by ID from API
     */
    public function getSertifikatAkreditasiById($id)
    {
        try {
            $response = Http::timeout($this->timeout)
                ->get($this->apiUrl . '/sertifikat-akreditasi/' . $id);

            if ($response->successful()) {
                $data = $response->json();
                
                // Handle different API response structures
                if (isset($data['data'])) {
                    return ensure_sertifikat_akreditasi_object($data['data']);
                } elseif (isset($data['sertifikat_akreditasi'])) {
                    return ensure_sertifikat_akreditasi_object($data['sertifikat_akreditasi']);
                } else {
                    return ensure_sertifikat_akreditasi_object($data);
                }
            }

            Log::warning('API Sertifikat Akreditasi detail returned non-successful status: ' . $response->status());
            return null;

        } catch (Exception $e) {
            Log::error('API Sertifikat Akreditasi Detail Error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Test API connection
     */
    public function testConnection()
    {
        try {
            $response = Http::timeout(10)->get($this->apiUrl . '/sertifikat-akreditasi');
            
            return [
                'success' => $response->successful(),
                'status' => $response->status(),
                'response_time' => $response->transferStats->getTransferTime() ?? 0,
                'url' => $this->apiUrl . '/sertifikat-akreditasi'
            ];

        } catch (Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage(),
                'url' => $this->apiUrl . '/sertifikat-akreditasi'
            ];
        }
    }
}