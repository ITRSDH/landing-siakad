<?php

if (!function_exists('debug_pengumuman_data')) {
    /**
     * Debug helper untuk data pengumuman
     */
    function debug_pengumuman_data($data) {
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
            'tanggal/date' => $array['tanggal'] ?? $array['date'] ?? 'MISSING'
        ];
        
        return $fields;
    }
}

if (!function_exists('ensure_pengumuman_object')) {
    /**
     * Pastikan data pengumuman dalam format object yang konsisten
     */
    function ensure_pengumuman_object($data) {
        if (is_array($data)) {
            return (object) $data;
        }
        return $data;
    }
}