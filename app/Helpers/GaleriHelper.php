<?php

if (!function_exists('debug_galeri_data')) {
    /**
     * Debug helper untuk data galeri
     */
    function debug_galeri_data($data) {
        if (is_object($data) && method_exists($data, 'toArray')) {
            $array = $data->toArray();
        } else {
            $array = (array) $data;
        }
        
        $fields = [
            'id' => $array['id'] ?? 'MISSING',
            'judul/title' => $array['judul'] ?? $array['title'] ?? 'MISSING',
            'kategori' => $array['kategori'] ?? 'MISSING',
            'deskripsi/description' => $array['deskripsi'] ?? $array['description'] ?? 'MISSING',
            'tanggal/date' => $array['tanggal'] ?? $array['date'] ?? 'MISSING',
            'gambar/logo' => $array['gambar'] ?? $array['logo'] ?? 'MISSING'
        ];
        
        return $fields;
    }
}

if (!function_exists('ensure_galeri_object')) {
    /**
     * Pastikan data galeri dalam format object yang konsisten
     */
    function ensure_galeri_object($data) {
        if (is_array($data)) {
            return (object) $data;
        }
        return $data;
    }
}