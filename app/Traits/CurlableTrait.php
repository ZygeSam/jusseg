<?php

namespace App\Traits;

trait CurlableTrait
{
    /**
     * Make the cURL request
     * @param $url
     * @param bool $param
     * @return mixed
     */
    protected function curl($headers, $url,  $param = false)
    {
        $header = $headers;
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);

        //Turn off SSL Checker
        // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, config('custom.curl.ssl'));

        if ($param) {
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $param);
        }

        $curl_response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($curl_response, true);

        return $response;
    }
}
