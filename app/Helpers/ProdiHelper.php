<?php

if (!function_exists('debug_prodi_data')) {
    /**
     * Debug helper untuk data prodi
     */
    function debug_prodi_data($data) {
        if (is_object($data) && method_exists($data, 'toArray')) {
            $array = $data->toArray();
        } else {
            $array = (array) $data;
        }
        
        $fields = [
            'id' => $array['id'] ?? 'MISSING',
            'kode_prodi' => $array['kode_prodi'] ?? $array['code'] ?? 'MISSING',
            'nama_prodi' => $array['nama_prodi'] ?? $array['name'] ?? 'MISSING',
            'akreditasi' => $array['akreditasi'] ?? $array['accreditation'] ?? 'MISSING',
            'tahun_berdiri' => $array['tahun_berdiri'] ?? $array['established_year'] ?? 'MISSING',
            'gelar_lulusan' => $array['gelar_lulusan'] ?? $array['degree'] ?? 'MISSING',
        ];
        
        return $fields;
    }
}

if (!function_exists('ensure_prodi_object')) {
    /**
     * Pastikan data prodi dalam format object yang konsisten
     */
    function ensure_prodi_object($data) {
        if (is_array($data)) {
            return (object) $data;
        }
        return $data;
    }
}