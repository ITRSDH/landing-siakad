<?php

if (!function_exists('debug_berita_data')) {
    /**
     * Debug helper untuk data berita
     */
    function debug_berita_data($data) {
        if (is_object($data) && method_exists($data, 'toArray')) {
            $array = $data->toArray();
        } else {
            $array = (array) $data;
        }
        
        $fields = [
            'id' => $array['id'] ?? 'MISSING',
            'judul/title' => $array['judul'] ?? $array['title'] ?? 'MISSING',
            'kategori' => $array['kategori'] ?? 'MISSING',
            'isi/content' => $array['isi'] ?? $array['content'] ?? 'MISSING',
            'tanggal/date' => $array['tanggal'] ?? $array['date'] ?? 'MISSING',
            'gambar/logo' => $array['gambar'] ?? $array['logo'] ?? 'MISSING'
        ];
        
        return $fields;
    }
}

if (!function_exists('ensure_berita_object')) {
    /**
     * Pastikan data berita dalam format object yang konsisten
     */
    function ensure_berita_object($data) {
        if (is_array($data)) {
            return (object) $data;
        }
        return $data;
    }
}