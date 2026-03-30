<?php

if (!function_exists('debug_profile_dosen_data')) {
    /**
     * Debug helper untuk data prestasi
     */
    function debug_profile_dosen_data($data) {
        if (is_object($data) && method_exists($data, 'toArray')) {
            $array = $data->toArray();
        } else {
            $array = (array) $data;
        }
        
        $fields = [
            'id' => $array['id'] ?? 'MISSING',
            'nama' => $array['nama'] ?? 'MISSING',
            'nidn' => $array['nidn'] ?? 'MISSING',
            'program_studi' => $array['program_studi'] ?? 'MISSING',
            'status' => $array['status'] ?? 'MISSING',
            'biografi' => $array['biografi'] ?? 'MISSING',
            'foto' => $array['foto'] ?? 'MISSING',
        ];
        
        return $fields;
    }
}

if (!function_exists('ensure_profile_dosen_object')) {
    /**
     * Pastikan data prestasi dalam format object yang konsisten
     * Menggunakan deep conversion untuk nested objects seperti 'prodi'
     */
    function ensure_profile_dosen_object($data) {
        if (is_array($data)) {
            // Deep conversion: semua nested arrays jadi objects
            // Contoh: array['prodi']['nama_prodi'] -> object->prodi->nama_prodi
            return json_decode(json_encode($data), false);
        }
        return $data;
    }
}