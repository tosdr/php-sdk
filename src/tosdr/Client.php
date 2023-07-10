<?php

namespace tosdr;

class Client {
    
    public const BASE_URL = 'https://api.tosdr.org';
    public const PHOENIX_BASE_URL = 'https://edit.tosdr.org';
    public const CRISP_BASE_URL = 'https://tosdr.org';
    public const SHIELDS_BASE_URL = 'https://shields.tosdr.org';

    public static function GET(string $url, array $params = [], int &$httpCode = null): array {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => $url . '?' . http_build_query($params),
            CURLOPT_USERAGENT => 'TOSDR API Client',
            CURLOPT_HTTPHEADER => [
                'Accept: application/json'
            ]
        ]);
        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        return json_decode($response, true);
    }

}