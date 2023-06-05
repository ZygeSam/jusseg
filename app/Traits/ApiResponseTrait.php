<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait ApiResponseTrait
{
    public function apiResponse($data)
    {
        return $data->successful() ? $data  : response()->json(['error' => 'Could not fetch from server']);
    }

    public function fetchWithToken($token, $url, $params = [])
    {
        return Http::withToken($token)->acceptJson()->get($url, $params);
    }

    public function postWithToken($token, $url, $params = [])
    {
        return Http::withToken($token)->post($url, $params);
    }

    public function postAsFormWithToken($token, $url, $params = [])
    {
        return Http::withToken($token)->asForm()->post($url, $params);
    }
}
