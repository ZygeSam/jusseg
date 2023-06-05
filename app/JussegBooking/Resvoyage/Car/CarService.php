<?php

namespace App\JussegBooking\Resvoyage\Car;;

use App\JussegBooking\Resvoyage\Auth\AccessToken;
use App\Traits\ApiResponseTrait;

class CarService
{
    use ApiResponseTrait;
    private $cn;
    private $url;
    private $params;

    public function __construct()
    {
        $this->cn = AccessToken::getToken();
    }

    /**
     * Gets  list of car vendors based on term
     * @return mixed
     */
    public function getCarVendorByTerm($term): object|array
    {
        $this->url = config('booking.resvoyage.api_url') . "/car/references/carvendors/$term";
        return $this->fetchWithToken($this->cn, $this->url);
    }

    /**
     * Gets  list of car categories
     * @return mixed
     */
    public function getCarCategories(): object|array
    {
        $this->url = config('booking.resvoyage.api_url') . "/car/references/categories";
        return $this->fetchWithToken($this->cn, $this->url);
    }

    /**
     * Gets  list of car types
     * @return mixed
     */
    public function getCarTypes(): object|array
    {
        $this->url = config('booking.resvoyage.api_url') . "/car/references/types";
        return $this->fetchWithToken($this->cn, $this->url);
    }

    /**
     * Gets  list of car terms
     * @return mixed
     */
    public function getCarTerms(): object|array
    {
        $this->url = config('booking.resvoyage.api_url') . "/car/references/terms";
        return $this->fetchWithToken($this->cn, $this->url);
    }

    /**
     * Gets  list of cars based on criteria
     * @return mixed
     */
    public function searchCar($params): object|array
    {
        $this->url = config('booking.resvoyage.api_url') . "/car/references/terms";
        $this->params = [
            'sessionId' => $params['sessionId'],
            'pickupCity' => $params['pickupCity'],
            'pickupPlaceId' => $params['pickupPlaceId'],
            'dropffCity' => $params['dropffCity'],
            'dropOffCity' => $params['dropOffCity'],
            'dropOffPlaceId' => $params['dropOffPlaceId'],
            'pickupDate' => $params['pickupDate'],
            'dropOffDate' => $params['dropOffDate'],
            'pickupTime' => $params['pickupTime'],
            'dropoffTime' => $params['dropoffTime'],
            'carType' => $params['carType'],
            'carCategory' => $params['carCategory'],
            'corporateDiscount' => $params['corporateDiscount'],
            'promotionCode' => $params['promotionCode'],
            'airCondition' => $params['airCondition'],
            'automatic' => $params['automatic'],
            'unlimitedMiles' => $params['unlimitedMiles'],
            'tripReasonId' => $params['tripReasonId'],
            'tripName' => $params['tripName'],
            'vendor' => $params['vendor'],
            'currencyCode' => $params['currencyCode'],
            'travellerInfo' => $params['travellerInfo']
        ];
        return $this->fetchWithToken($this->cn, $this->url, $this->params);
    }

    /**
     * Gets  car details
     * @return mixed
     */
    public function getCarDetails($params): object|array
    {
        $this->url = config('booking.resvoyage.api_url') . "/car/references/terms";
        $this->params = [
            'sessionId' => $params["sessionId"],
            'carId' => $params["carId"]
        ];
        return $this->fetchWithToken($this->cn, $this->url);
    }

    /**
     * Gets  list of destinations based on search criteria
     * @return mixed
     */
    public function getDestinations($term): object|array
    {
        $this->url = config('booking.resvoyage.api_url') . "/car/references/destination/$term";
        return $this->fetchWithToken($this->cn, $this->url);
    }
}
