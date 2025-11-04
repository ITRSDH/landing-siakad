<?php

if (!function_exists('debug_landing_data')) {
    /**
     * Debug helper untuk data landing
     */
    function debug_landing_data($data) {
        if (is_object($data) && method_exists($data, 'toArray')) {
            $array = $data->toArray();
        } else {
            $array = (array) $data;
        }
        
        $fields = [
            'id' => $array['id'] ?? 'MISSING',
            'judul/title' => $array['judul'] ?? $array['title'] ?? 'MISSING',
            'deskripsi/description' => $array['deskripsi'] ?? $array['description'] ?? 'MISSING',
            'visi' => $array['visi'] ?? $array['vision'] ?? 'MISSING',
            'misi' => $array['misi'] ?? $array['mission'] ?? 'MISSING',
            'sejarah/history' => $array['sejarah'] ?? $array['history'] ?? 'MISSING',
            'fasilitas/facilities' => $array['fasilitas'] ?? $array['facilities'] ?? 'MISSING',
            'struktur_image/struktur_foto' => $array['struktur_image'] ?? $array['struktur_foto'] ?? 'MISSING',
            'logo' => $array['logo'] ?? 'MISSING',
            'alamat/address' => $array['alamat'] ?? $array['address'] ?? 'MISSING',
            'telepon/phone' => $array['telepon'] ?? $array['phone'] ?? 'MISSING',
            'email' => $array['email'] ?? 'MISSING',
            'website' => $array['website'] ?? 'MISSING',
            'created_at' => $array['created_at'] ?? 'MISSING',
            'updated_at' => $array['updated_at'] ?? 'MISSING'
        ];
        
        return $fields;
    }
}

if (!function_exists('ensure_landing_object')) {
    /**
     * Pastikan data landing dalam format object yang konsisten
     */
    function ensure_landing_object($data) {
        if (is_array($data)) {
            return (object) $data;
        }
        return $data;
    }
}