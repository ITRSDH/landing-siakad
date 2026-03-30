<?php

if (!function_exists('debug_pmb_data')) {
    /**
     * Debug helper untuk data pmb
     */
    function debug_pmb_data($data) {
        if (is_object($data) && method_exists($data, 'toArray')) {
            $array = $data->toArray();
        } else {
            $array = (array) $data;
        }
        
        $fields = [
            'id' => $array['id'] ?? 'MISSING',
            'tata_cara' => $array['tata_cara'] ?? $array['title'] ?? 'MISSING',
            'deskripsi/description' => $array['deskripsi'] ?? $array['description'] ?? 'MISSING',
            'created_at' => $array['created_at'] ?? 'MISSING',
            'updated_at' => $array['updated_at'] ?? 'MISSING'
        ];
        
        return $fields;
    }
}

if (!function_exists('ensure_pmb_object')) {
    /**
     * Pastikan data pmb dalam format object yang konsisten
     */
    function ensure_pmb_object($data) {
        if (is_array($data)) {
            return (object) $data;
        }
        return $data;
    }
}