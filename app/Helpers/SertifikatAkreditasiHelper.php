<?php

if (!function_exists('debug_sertifikat_akreditasi_data')) {
    /**
     * Debug helper untuk data sertifikat akreditasi
     */
    function debug_sertifikat_akreditasi_data($data) {
        if (is_object($data) && method_exists($data, 'toArray')) {
            $array = $data->toArray();
        } else {
            $array = (array) $data;
        }
        
        $fields = [
            'id' => $array['id'] ?? 'MISSING',
            'nama/name' => $array['nama'] ?? $array['name'] ?? 'MISSING',
            'deskripsi/description' => $array['deskripsi'] ?? $array['description'] ?? 'MISSING',
            'foto_sertifikat' => $array['foto_sertifikat'] ?? $array['gambar'] ?? $array['logo'] ?? 'MISSING',
        ];
        
        return $fields;
    }
}

if (!function_exists('ensure_sertifikat_akreditasi_object')) {
    /**
     * Pastikan data sertifikat akreditasi dalam format object yang konsisten
     */
    function ensure_sertifikat_akreditasi_object($data) {
        if (is_array($data)) {
            $keys = array_keys($data);
            $isList = $keys === array_keys($keys);
            if ($isList) {
                $data = $data[0] ?? [];
            }

            return json_decode(json_encode($data), false);
        }

        return $data;
    }
}