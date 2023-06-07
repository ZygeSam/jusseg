<?php

namespace App\JussegBooking\Resvoyage\Auth;

use App\Traits\ApiResponseTrait;

use Illuminate\Support\Facades\Http;

class AccessToken
{
    use ApiResponseTrait;
    private $url;
    private static $token;
    private static $expiry;
    /**
     * Make the cURL call for accessing bearer token
     * Bearer token expires 300 minutes after created
     * @param $clientname
     * @return mixed
     */
    public function getToken()
    {
        if (!isset(self::$token) || $this->isTokenExpired()) {

            $this->url = config('booking.resvoyage.api_url') . "/public/token";

            //get the token 
            $response =
                Http::acceptJson()->get($this->url, [
                    'clientname' => config('booking.resvoyage.clientname')
                ]);
            $token =  $this->apiResponse($response);

            if ($token) {
                self::$token = json_decode($token)->Token;
                self::$expiry = time() + 300 * 60; // Set token expiry time to 300 seconds * 60  (5*60 minutes)
            }
        }
        return self::$token;
    }

    /**
     * Check if the token has expired
     * @return bool
     */
    private function isTokenExpired()
    {
        return isset(self::$expiry) && self::$expiry <= time();
    }
}
