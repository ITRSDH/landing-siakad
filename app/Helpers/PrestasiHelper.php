<?php

if (!function_exists('debug_prestasi_data')) {
    /**
     * Debug helper untuk data prestasi
     */
    function debug_prestasi_data($data) {
        if (is_object($data) && method_exists($data, 'toArray')) {
            $array = $data->toArray();
        } else {
            $array = (array) $data;
        }
        
        $fields = [
            'id' => $array['id'] ?? 'MISSING',
            'nama_mahasiswa' => $array['nama_mahasiswa'] ?? 'MISSING',
            'program_studi' => $array['program_studi'] ?? 'MISSING',
            'judul_prestasi' => $array['judul_prestasi'] ?? 'MISSING',
            'deskripsi/description' => $array['deskripsi'] ?? $array['description'] ?? 'MISSING',
            'gambar/logo' => $array['gambar'] ?? $array['logo'] ?? 'MISSING',
            'tingkat' => $array['tingkat'] ?? 'MISSING',
            'tahun' => $array['tahun'] ?? 'MISSING'
        ];
        
        return $fields;
    }
}

if (!function_exists('ensure_prestasi_object')) {
    /**
     * Pastikan data prestasi dalam format object yang konsisten
     * Menggunakan deep conversion untuk nested objects seperti 'prodi'
     */
    function ensure_prestasi_object($data) {
        if (is_array($data)) {
            // Deep conversion: semua nested arrays jadi objects
            // Contoh: array['prodi']['nama_prodi'] -> object->prodi->nama_prodi
            return json_decode(json_encode($data), false);
        }
        return $data;
    }
}