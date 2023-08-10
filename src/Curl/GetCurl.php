<?php

namespace WalnutBread\Curl;

class GetCurl
{
    public static function get($url, $getData, $header = null): array|string
    {
        $url = $url."?".http_build_query($getData, '', '&');

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
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