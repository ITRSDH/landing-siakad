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
    public function getAllBerita($page = 1)
    {
        try {
            $response = Http::timeout($this->timeout)->get($this->apiUrl . '/berita', ['page' => $page]);

            if ($response->successful()) {
                $data = $response->json();

                Log::debug('API Berita response:', [
                    'status' => $data['status'] ?? 'unknown',
                    'has_data' => isset($data['data']),
                    'structure' => isset($data['data']['data']) ? 'paginated' : 'direct',
                ]);

                // Handle paginated response: {status, data: {current_page, data: [...], total, ...}}
                if (isset($data['data']) && is_array($data['data'])) {
                    // If it's a paginated response with nested data
                    if (isset($data['data']['data']) && isset($data['data']['total'])) {
                        return [
                            'items' => collect($data['data']['data'])->map(function ($item) {
                                return ensure_berita_object($item);
                            }),
                            'pagination' => [
                                'current_page' => $data['data']['current_page'] ?? 1,
                                'total' => $data['data']['total'] ?? 0,
                                'per_page' => $data['data']['per_page'] ?? 10,
                                'last_page' => $data['data']['last_page'] ?? 1,
                                'from' => $data['data']['from'] ?? null,
                                'to' => $data['data']['to'] ?? null,
                                'next_page_url' => $data['data']['next_page_url'] ?? null,
                                'prev_page_url' => $data['data']['prev_page_url'] ?? null,
                                'links' => $data['data']['links'] ?? [],
                            ],
                        ];
                    }
                    // If it's a direct array
                    else {
                        return [
                            'items' => collect($data['data'])->map(function ($item) {
                                return ensure_berita_object($item);
                            }),
                            'pagination' => null,
                        ];
                    }
                }

                Log::warning('API Pengumuman response missing data field');
                return null;
            }
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
            $response = Http::timeout($this->timeout)->get($this->apiUrl . '/berita/' . $id);

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
                'url' => $this->apiUrl . '/berita',
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage(),
                'url' => $this->apiUrl . '/berita',
            ];
        }
    }
}
