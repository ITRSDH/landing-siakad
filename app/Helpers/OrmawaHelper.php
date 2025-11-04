<?php

if (!function_exists('debug_ormawa_data')) {
    /**
     * Debug helper untuk data ormawa
     */
    function debug_ormawa_data($data) {
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
            'jumlah_anggota/member_count' => $array['jumlah_anggota'] ?? $array['member_count'] ?? 'MISSING'
        ];
        
        return $fields;
    }
}

if (!function_exists('ensure_ormawa_object')) {
    /**
     * Pastikan data ormawa dalam format object yang konsisten
     */
    function ensure_ormawa_object($data) {
        if (is_array($data)) {
            return (object) $data;
        }
        return $data;
    }
}