<?php

if (!function_exists('debug_beasiswa_data')) {
    /**
     * Debug helper untuk data beasiswa
     */
    function debug_beasiswa_data($data) {
        if (is_object($data) && method_exists($data, 'toArray')) {
            $array = $data->toArray();
        } else {
            $array = (array) $data;
        }
        
        $fields = [
            'id' => $array['id'] ?? 'MISSING',
            'nama/name' => $array['nama'] ?? $array['name'] ?? 'MISSING',
            'kategori' => $array['kategori'] ?? 'MISSING',
            'deskripsi/description' => $array['deskripsi'] ?? $array['description'] ?? 'MISSING',
            'gambar/logo' => $array['gambar'] ?? $array['logo'] ?? 'MISSING',
            'deadline' => $array['deadline'] ?? 'MISSING',
            'kuota' => $array['kuota'] ?? 'MISSING'
        ];
        
        return $fields;
    }
}

if (!function_exists('ensure_beasiswa_object')) {
    /**
     * Pastikan data beasiswa dalam format object yang konsisten
     */
    function ensure_beasiswa_object($data) {
        if (is_array($data)) {
            return (object) $data;
        }
        return $data;
    }
}