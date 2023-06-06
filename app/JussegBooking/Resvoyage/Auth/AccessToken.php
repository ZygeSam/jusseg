<?php

namespace App\JussegBooking\Resvoyage\Auth;

use App\Traits\ApiResponseTrait;

use Illuminate\Support\Facades\Http;

class AccessToken
{
    use ApiResponseTrait;
    private $url;
    /**
     * Make the cURL call for accessing bearer token
     * Bearer token expires 300 minutes after created
     * @param $clientname
     * @return mixed
     */
    public function getToken()
    {
        $this->url = config('booking.resvoyage.api_url') . "/public/token";

        //get the token 
        $token =
            Http::acceptJson()->get($this->url, [
                'clientname' => config('booking.resvoyage.clientname')
            ]);
        return $this->apiResponse($token);

        //cache token
        //refresh token after 300 minutes
    }
}
