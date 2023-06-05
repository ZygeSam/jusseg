<?php

namespace App\JussegBooking\Resvoyage\Hotel;;

use App\JussegBooking\Resvoyage\Auth\AccessToken;
use App\Traits\ApiResponseTrait;

class HotelBooking
{
    use ApiResponseTrait;
    private $cn;
    private $url;
    private $params;

    public function __construct()
    {
        $this->cn = AccessToken::getToken();
    }

    public function getHotels($term)
    {
        $this->url = config('booking.resvoyage.api_url') . "/hotel/references/hotelchain/$term";
        return $this->fetchWithToken($this->cn, $this->url);
    }

    public function getHotelDestination($term)
    {
        $this->url = config('booking.resvoyage.api_url') . "/hotel/references/destination/$term";
        return $this->fetchWithToken($this->cn, $this->url);
    }

    public function searchHotelDestination($params)
    {
        $this->url = config('booking.resvoyage.api_url') . "/hotel/references/destination/search";
        $this->params = [
            'criteria' => $params['criteria']
        ];
        return $this->postWithToken($this->cn, $this->url, $this->params);
    }

    public function getAvailableHotels($params)
    {
        $this->url = config('booking.resvoyage.api_url') . "/hotel/search";
        $this->params = [
            'currencyCode' => $params['currencyCode'],
            'sessionId' => $params['sessionId'],
            'hotelCityCode' => $params['hotelCityCode'],
            'hotelCode' => $params['hotelCode'],
            'hotelChainCode' => $params['hotelChainCode'],
            'hotelName' => $params['hotelName'],
            'hotelContext' => $params['hotelContext'],
            'checkInDate' => $params['checkInDate'],
            'checkOutDate' => $params['checkOutDate'],
            'adults' => $params['adults'],
            'children' => $params['children'],
            'pageSize' => $params['pageSize'],
            'page' => $params['page'],
            'childrenAge' => $params['childrenAge'],
            'roomCount' => $params['roomCount'],
            'roomType' => $params['roomType'],
            'ratePlan' => $params['ratePlan'],
            'propertyCode' => $params['propertyCode'],
            'streetAddress' => $params['streetAddress'],
            'postalCode' => $params['postalCode'],
            'area' => $params['area'],
            'pointOfInterest' => $params['pointOfInterest'],
            'cityName' => $params['cityName'],
            'adults2' => $params['adults2'],
            'children2' => $params['children2'],
            'childrenAge2' => $params['childrenAge2'],
            'adults3' => $params['adults3'],
            'children3' => $params['children3'],
            'childrenAge3' => $params['childrenAge3'],
            'adults4' => $params['adults4'],
            'children4' => $params['children4'],
            'childrenAge4' => $params['childrenAge4'],
            'adults5' => $params['adults5'],
            'children5' => $params['children5'],
            'childrenAge5' => $params['childrenAge5'],
            'adults6' => $params['adults6'],
            'children6' => $params['children6'],
            'childrenAge6' => $params['childrenAge6'],
            'adults7' => $params['adults7'],
            'children7' => $params['children7'],
            'childrenAge7' => $params['childrenAge7'],
            'adults8' => $params['adults8'],
            'children8' => $params['children8'],
            'childrenAge8' => $params['childrenAge8'],
            'tripReasonId' => $params['tripReasonId'],
            'tripName' => $params['tripName'],
            'placeId' => $params['placeId'],
            'radiusSize' => $params['radiusSize'],
            'radiusUnit' => $params['radiusUnit'],
            'latitude' => $params['latitude'],
            'longitude' => $params['longitude'],
            'travellerInfo' => $params['travellerInfo']

        ];
        return $this->postWithToken($this->cn, $this->url, $this->params);
    }

    public function getHotelDetails($params)
    {
        $this->url = config('booking.resvoyage.api_url') . "/hotel/details";
        $this->params = [
            'sessionId' => $params['sessionId'],
            'hotelId' => $params['hotelId'],
        ];
        return $this->postWithToken($this->cn, $this->url, $this->params);
    }

    public function getHotelPurchasingRules($params)
    {
        $this->url = config('booking.resvoyage.api_url') . "/hotel/rate/details";
        $this->params = [
            'sessionId' => $params['sessionId'],
            'hotelId' => $params['hotelId'],
        ];
        return $this->postWithToken($this->cn, $this->url, $this->params);
    }
}
