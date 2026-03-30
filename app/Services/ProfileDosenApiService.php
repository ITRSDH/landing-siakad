<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Exception;

class ProfileDosenApiService
{
    protected $apiUrl;
    protected $timeout;

    public function __construct()
    {
        $this->apiUrl = rtrim(config('app.api_url'), '/');
        $this->timeout = 30; // 30 seconds timeout
    }

    /**
     * Get all Prodi data from API limit 3
     * Response structure: {status: "success", data: [{id, nama_prodi, prestasi: [...]}, ...]}
     */
    public function getAllProfileDosenLimit()
    {
        try {
            $response = Http::timeout($this->timeout)->get($this->apiUrl . '/profile-dosen/limit');
            if ($response->successful()) {
                $data = $response->json();
                
                Log::debug('API Profile Dosen response:', [
                    'status' => $data['status'] ?? 'unknown',
                    'has_data' => isset($data['data']),
                    'data_type' => gettype($data['data'] ?? null)
                ]);

                // Extract data array from response
                if (isset($data['data']) && is_array($data['data'])) {
                    return $data['data'];
                }
                
                return null;
            }

            Log::warning('API Profile Dosen returned non-successful status: ' . $response->status());
            return null;
        } catch (Exception $e) {
            Log::error('API Profile Dosen Error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Get all Prodi data from API
     * Response structure: {status: "success", data: [{id, nama_prodi, prestasi: [...]}, ...]}
     */
    public function getAllProfileDosen()
    {
        try {
            $response = Http::timeout($this->timeout)->get($this->apiUrl . '/profile-dosen');
            if ($response->successful()) {
                $data = $response->json();
                
                Log::debug('API Profile Dosen response:', [
                    'status' => $data['status'] ?? 'unknown',
                    'has_data' => isset($data['data']),
                    'data_type' => gettype($data['data'] ?? null)
                ]);

                // Extract data array from response
                if (isset($data['data']) && is_array($data['data'])) {
                    return $data['data'];
                }
                
                return null;
            }

            Log::warning('API Profile Dosen returned non-successful status: ' . $response->status());
            return null;
        } catch (Exception $e) {
            Log::error('API Profile Dosen Error: ' . $e->getMessage());
            return null;
        }
    }

    public function getProfileDosenById($id)
    {
        try {
            $response = Http::timeout($this->timeout)->get($this->apiUrl . '/profile-dosen/' . $id);

            if ($response->successful()) {
                $data = $response->json();

                Log::debug('API Profile Dosen detail response:', [
                    'status' => $data['status'] ?? 'unknown',
                    'has_data' => isset($data['data']),
                    'data_type' => gettype($data['data'] ?? null)
                ]);

                if (isset($data['data']) && is_array($data['data'])) {
                    return [
                        'prodi' => $data['data']['prodi'] ?? [],
                        'dosen' => $data['data']['dosen'] ?? null,
                    ];
                }
                
                return null;
            }

            Log::warning('API Prodi detail returned non-successful status: ' . $response->status());
            return null;
        } catch (Exception $e) {
            Log::error('API Prodi Detail Error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Test API connection
     */
    public function testConnection()
    {
        try {
            $response = Http::timeout(10)->get($this->apiUrl . '/profile-dosen');

            return [
                'success' => $response->successful(),
                'status' => $response->status(),
                'response_time' => $response->transferStats->getTransferTime() ?? 0,
                'url' => $this->apiUrl . '/profile-dosen',
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage(),
                'url' => $this->apiUrl . '/profile-dosen',
            ];
        }
    }
}
