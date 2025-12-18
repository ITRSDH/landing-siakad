<?php

if (!function_exists('debug_faq_data')) {
    /**
     * Debug helper untuk data faq
     */
    function debug_faq_data($data) {
        if (is_object($data) && method_exists($data, 'toArray')) {
            $array = $data->toArray();
        } else {
            $array = (array) $data;
        }
        
        $fields = [
            'id' => $array['id'] ?? 'MISSING',
            'pertanyaan' => $array['pertanyaan'] ?? $array['question'] ?? 'MISSING',
            'jawaban' => $array['jawaban'] ?? $array['answer'] ?? 'MISSING',
        ];
        
        return $fields;
    }
}

if (!function_exists('ensure_faq_object')) {
    /**
     * Pastikan data faq dalam format object yang konsisten
     */
    function ensure_faq_object($data) {
        if (is_array($data)) {
            return (object) $data;
        }
        return $data;
    }
}