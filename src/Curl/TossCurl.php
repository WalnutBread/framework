<?php

namespace WalnutBread\Curl;

class TossCurl
{
    public static function post($url, $credential, $postData): string {
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

        return curl_exec($curlHandle);
    }
}