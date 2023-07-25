<?php

namespace WalnutBread\Curl;

class PostCurl
{
    public static function post($url, $postData, $header = null): string
    {
        $curl = curl_init();
        if( strpos($url, "https://") !== false ) {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        }
        if( $header != null) {
            curl_setopt($curl, CURLOPT_HEADER, $header);
        }

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        if( empty($response) ) {
            return "{\"file_url\":\"error\"}";
        }
        $jsonData = substr($response, strpos($response, "{"));
        curl_close($curl);

        return $jsonData;
    }
}