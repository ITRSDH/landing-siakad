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
        $this->timeout = 30;
    }


    /**
     * Get all Sertifikat Akreditasi
     */
    public function getAllSertifikatAkreditasi()
    {
        try {

            $response = Http::timeout($this->timeout)
                ->get($this->apiUrl . '/sertifikat-akreditasi');


            if (!$response->successful()) {

                Log::warning(
                    'API Sertifikat Akreditasi gagal: '
                    . $response->status()
                );

                return collect();

            }


            $data = $response->json();


            return collect($data['data'] ?? [])
                ->map(function ($item) {

                    return ensure_sertifikat_akreditasi_object($item);

                });


        } catch (Exception $e) {


            Log::error(
                'API Sertifikat Akreditasi Error: '
                . $e->getMessage()
            );


            return collect();

        }
    }



    /**
     * Get detail Sertifikat Akreditasi
     */
    public function getSertifikatAkreditasiById($id)
    {
        try {


            $response = Http::timeout($this->timeout)
                ->get(
                    $this->apiUrl .
                    '/sertifikat-akreditasi/' .
                    $id
                );


            if (!$response->successful()) {

                Log::warning(
                    'API Detail Sertifikat gagal: '
                    . $response->status()
                );

                return null;

            }


            $data = $response->json();


            return ensure_sertifikat_akreditasi_object(
                $data['data'] ?? []
            );


        } catch (Exception $e) {


            Log::error(
                'API Detail Sertifikat Error: '
                . $e->getMessage()
            );


            return null;

        }
    }


    /**
     * Test API Connection
     */
    public function testConnection()
    {
        try {

            $start = microtime(true);


            $response = Http::timeout(10)
                ->get(
                    $this->apiUrl .
                    '/sertifikat-akreditasi'
                );


            return [

                'success' => $response->successful(),

                'status' => $response->status(),

                'response_time' =>
                    round(
                        microtime(true)-$start,
                        3
                    ),

                'url' =>
                    $this->apiUrl .
                    '/sertifikat-akreditasi'

            ];


        } catch(Exception $e) {


            return [

                'success'=>false,

                'error'=>$e->getMessage(),

                'url'=>
                    $this->apiUrl .
                    '/sertifikat-akreditasi'

            ];

        }
    }
}