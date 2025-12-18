<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Exception;

class ProdiApiService
{
    protected $apiUrl;
    protected $timeout;

    public function __construct()
    {
        $this->apiUrl = rtrim(config('app.api_url'), '/');
        $this->timeout = 30; // 30 seconds timeout
    }

    /**
     * Get all Prodi data from API
     * Response structure: {status: "success", data: [{id, nama_prodi, prestasi: [...]}, ...]}
     */
    public function getAllProdi()
    {
        try {
            $response = Http::timeout($this->timeout)->get($this->apiUrl . '/prodi');
            if ($response->successful()) {
                $data = $response->json();
                
                Log::debug('API Prodi response:', [
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

            Log::warning('API Prodi returned non-successful status: ' . $response->status());
            return null;
        } catch (Exception $e) {
            Log::error('API Prodi Error: ' . $e->getMessage());
            return null;
        }
    }

    public function getProdiById($id)
    {
        try {
            $response = Http::timeout($this->timeout)->get($this->apiUrl . '/prodi/' . $id);

            if ($response->successful()) {
                $data = $response->json();

                Log::debug('API Prodi detail response:', [
                    'status' => $data['status'] ?? 'unknown',
                    'has_data' => isset($data['data']),
                    'data_type' => gettype($data['data'] ?? null)
                ]);

                // Extract single prodi object from data
                if (isset($data['data'])) {
                    $prodi = $data['data'];
                    
                    // Transform to match expected structure: {prodi: {...}, prestasi: [...]}
                    return [
                        'prodi' => $prodi,
                        'prestasi' => $prodi['prestasi'] ?? []
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
            $response = Http::timeout(10)->get($this->apiUrl . '/prodi');

            return [
                'success' => $response->successful(),
                'status' => $response->status(),
                'response_time' => $response->transferStats->getTransferTime() ?? 0,
                'url' => $this->apiUrl . '/prodi',
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage(),
                'url' => $this->apiUrl . '/prodi',
            ];
        }
    }
}
