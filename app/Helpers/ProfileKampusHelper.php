<?php

if (!function_exists('debug_profil_data')) {
    /**
     * Debug helper untuk data profil
     */
    function debug_profil_data($data) {
        if (is_object($data) && method_exists($data, 'toArray')) {
            $array = $data->toArray();
        } else {
            $array = (array) $data;
        }
        
        $fields = [
            'id' => $array['id'] ?? 'MISSING',
            'judul/title' => $array['judul'] ?? $array['title'] ?? 'MISSING',
            'deskripsi' => $array['deskripsi'] ?? 'MISSING',
            'visi' => $array['visi'] ?? 'MISSING',
            'misi' => $array['misi'] ?? 'MISSING',
            'struktur_image' => $array['struktur_image'] ?? 'MISSING'
        ];
        
        return $fields;
    }
}

if (!function_exists('ensure_profil_object')) {
    /**
     * Pastikan data profil dalam format object yang konsisten
     */
    function ensure_profil_object($data) {
        if (is_array($data)) {
            return (object) $data;
        }
        return $data;
    }
}