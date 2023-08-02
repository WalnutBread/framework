<?php

namespace WalnutBread\Curl;

class TossCurl
{
    public static function post($url, $credential, $postData): array {
        $curlHandle = curl_init($url);

        curl_setopt_array($curlHandle, [
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HTTPHEADER => [
                'Authorization: Basic ' . $credential,
                'Content-Type: application/json'
            ],
            CURLOPT_POSTFIELDS => json_encode($postData)
        ]);
        $httpCode = curl_getinfo($curlHandle, CURLINFO_HTTP_CODE);
        $response = curl_exec($curlHandle);

        return [
            "code" => $httpCode,
            "response" => $response
        ];
    }
}