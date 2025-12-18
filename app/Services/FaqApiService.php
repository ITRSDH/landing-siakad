<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Exception;

class FaqApiService
{
    protected $apiUrl;
    protected $timeout;

    public function __construct()
    {
        $this->apiUrl = rtrim(config('app.api_url'), '/');
        $this->timeout = 30; // 30 seconds timeout
    }

    /**
     * Get all Faq data from API
     */
    public function getAllFaq()
    {
        try {
            $response = Http::timeout($this->timeout)
                ->get($this->apiUrl . '/faq');
            if ($response->successful()) {
                $data = $response->json();
                
                // Handle different API response structures
                if (isset($data['data'])) {
                    return collect($data['data'])->map(function($item) {
                        return ensure_faq_object($item);
                    });
                } elseif (isset($data['faq'])) {
                    return collect($data['faq'])->map(function($item) {
                        return ensure_faq_object($item);
                    });
                } else {
                    return collect($data)->map(function($item) {
                        return ensure_faq_object($item);
                    });
                }
            }

            Log::warning('API Faq returned non-successful status: ' . $response->status());
            return null;

        } catch (Exception $e) {
            Log::error('API Faq Error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Test API connection
     */
    public function testConnection()
    {
        try {
            $response = Http::timeout(10)->get($this->apiUrl . '/faq');
            
            return [
                'success' => $response->successful(),
                'status' => $response->status(),
                'response_time' => $response->transferStats->getTransferTime() ?? 0,
                'url' => $this->apiUrl . '/faq'
            ];

        } catch (Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage(),
                'url' => $this->apiUrl . '/faq'
            ];
        }
    }
}