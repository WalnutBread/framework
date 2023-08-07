<?php

namespace WalnutBread\Curl;

class PostCurl
{
    public static function post($url, $postData, $header = null): array | string
    {
        $curl = curl_init();
        if( strpos($url, "https://") !== false ) {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        }
        if( $header != null) {
            curl_setopt($curl, CURLOPT_HEADER, $header);
        } else {
            curl_setopt($curl, CURLOPT_HEADER, false);
        }

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 20); // (sec)
        curl_setopt($curl, CURLOPT_FAILONERROR, true);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $response = curl_exec($curl);
        curl_close($curl);
        if( curl_error($curl) ) {
            return curl_error($curl); # string
        }

        return [
                "code" => $httpCode,
                "response" => $response
        ];
    }
}