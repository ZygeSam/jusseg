<?php

namespace App\JussegBooking\Resvoyage\Air;

use App\JussegBooking\Resvoyage\Auth\AccessToken;
use App\Traits\ApiResponseTrait;

class Airline
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
     * Gets airlines
     * @return mixed
     */
    public function getAirlines($params): object|array
    {
        $this->url = config('booking.resvoyage.api_url') . "/air/references/airlines";
        $this->params = [
            'search' => $params['search'],
            'count' => $params['count']
        ];
        return $this->fetchWithToken($this->cn, $this->url, $this->params);
    }

    /**
     * Gets airlines logo
     * @return mixed
     */
    public function getAirlineLogo($code): object|array
    {
        $this->url = config('booking.resvoyage.api_url') . "/air/references/airlines/$code/logo";
        return $this->fetchWithToken($this->cn, $this->url);
    }

    /**
     * Gets all airlines for specific alliance
     * @return mixed
     */
    public function getAirlineAlliance($name): object|array
    {
        $this->url = config('booking.resvoyage.api_url') . "/air/references/airlines/alliance/$name";
        return $this->fetchWithToken($this->cn, $this->url);
    }

    /**
     * Gets frequent flyer programs
     * @return mixed
     */
    public function getFrequentFlyersProgram(): object|array
    {
        $this->url = config('booking.resvoyage.api_url') . "/air/references/airlines/alliance/frequent-flyer-programs";
        return $this->fetchWithToken($this->cn, $this->url);
    }

    /**
     * Gets all meals option
     * @return mixed
     */
    public function getMealsOption(): object|array
    {
        $this->url = config('booking.resvoyage.api_url') . "/air/references/meals";
        return $this->fetchWithToken($this->cn, $this->url);
    }

    /**
     * Gets nearby airports to location
     * @return mixed
     */
    public function getNearByAirports($params): object|array
    {
        $this->url = config('booking.resvoyage.api_url') . "/air/references/nearby";
        $this->params = [
            'longitude' => $params['long'],
            'latitude' => $params['lat']
        ];
        return $this->fetchWithToken($this->cn, $this->url, $this->params);
    }

    /**
     * Gets list of all airports
     * @return mixed
     */
    public function getAirports($params): object|array
    {
        $this->url = config('booking.resvoyage.api_url') . "/air/references/airports";
        $this->params = [
            'search' => $params['search'],
            'code' => $params['code'],
            'count' => $params['count'],
            'isDeparture' => $params['isDeparture']
        ];
        return $this->fetchWithToken($this->cn, $this->url, $this->params);
    }

    /**
     * Cache list of all airports
     * @return mixed
     */
    public function cacheAirports(): object|array
    {
        $this->url = config('booking.resvoyage.api_url') . "/air/references/airports/cache";
        return $this->fetchWithToken($this->cn, $this->url);
    }

    /**
     * Gets flight purchase conditions
     * @return mixed
     */
    public function getFlightRules($params): object|array
    {
        $this->url = config('booking.resvoyage.api_url') . "/air/references/flight/rules";
        $this->params = [
            'sessionId' => $params["sessionId"],
            'itineraryId' => $params["itineraryId"]
        ];
        return $this->fetchWithToken($this->cn, $this->url, $this->params);
    }

    /**
     * Search for flights based on criterias
     * @return mixed
     */
    public function searchFlight($params): object|array
    {
        $this->url = config('booking.resvoyage.api_url') . "/air/references/flight/rules";
        $this->params = [
            'from1' => $params['from1'],
            'from2' => $params['from2'],
            'from3' => $params['from3'],
            'from4' => $params['from4'],
            'to1' => $params['to1'],
            'to2' => $params['to2'],
            'to3' => $params['to3'],
            'to4' => $params['to4'],
            'departureDate1' => $params['departureDate1'],
            'departureDate2' => $params['departureDate2'],
            'departureDate3' => $params['departureDate3'],
            'departureDate4' => $params['departureDate4'],
            'preferredTime1' => $params['preferredTime1'],
            'preferredTime2' => $params['preferredTime2'],
            'preferredTime3' => $params['preferredTime3'],
            'preferredTime4' => $params['preferredTime4'],
            'timeWindow' => $params['timewindow'],
            'tripReasonId' => $params['tripReasonId'],
            'tripName' => $params['tripName'],
            'adults' => $params['adults'],
            'children' => $params['children'],
            'infants' => $params['infants'],
            'directFlightsOnly' => $params['directFlightsOnly'],
            'flexibleDates' => $params['flexibleDates'],
            'departureFlexInterval' => $params['departureFlexInterval'],
            'destinationFlexInterval' => $params['destinationFlexInterval'],
            'nearbyAirports' => $params['nearbyAirports'],
            'withoutPenaltiesOnly' => $params['withoutPenaltiesOnly'],
            'prefferedAirlines' => $params['prefferedAirlines'],
            'flightClass' => $params['flightClass'],
            'sessionId' => $params['sessionId'],
            'cabinClasses' => $params['cabinClasses'],
            'additionalEmployees' => $params['additionalEmployees'],
            'guests' => $params['guests'],
            'deepLinkBaseUrl' => $params['deepLinkBaseUrl'],
            'deepLink' => $params['deepLink'],
            'meta' => $params['meta'],
            'fullApiIntegration' => $params['fullApiIntegration'],
            'flightInfo' => $params['flightInfo'],
            'maxNumOfFlights' => $params['maxNumOfFlights'],
            'fareAmount' => $params['fareAmount'],
            'refundableAndChangeableOnly' => $params['refundableAndChangeableOnly'],
            'oWCSearch' => $params['oWCSearch'],
            'travellerInfo' => $params['travellerInfo'],
            'officeId' => $params['officeId']
        ];
        return $this->fetchWithToken($this->cn, $this->url);
    }

    /**
     * Gets FareFamilies(Branded Fare) from Amadeus
     * @return mixed
     */
    public function getBrandedFare($params): object|array
    {
        $this->url = config('booking.resvoyage.api_url') . "/air/upsell";
        $this->params = [
            'sessionId' => $params["sessionId"],
            'itineraryId' => $params["itineraryId"]
        ];
        return $this->fetchWithToken($this->cn, $this->url, $this->params);
    }

    /**
     * Gets Flights based on metaEngine
     * @return mixed
     */
    public function getFlightByMetaEngine($metaEengine): object|array
    {
        $this->url = config('booking.resvoyage.api_url') . "/air/meta/$metaEengine/search";
        return $this->fetchWithToken($this->cn, $this->url);
    }

    /**
     * Add flight to cart from a deep link selection
     * @return mixed
     */
    public function addFlightToCart($params): object|array
    {
        $this->url = config('booking.resvoyage.api_url') . "/air/cart/add";
        $this->params = [
            'from1' => $params['from1'],
            'from2' => $params['from2'],
            'from3' => $params['from3'],
            'from4' => $params['from4'],
            'to1' => $params['to1'],
            'to2' => $params['to2'],
            'to3' => $params['to3'],
            'to4' => $params['to4'],
            'departureDate1' => $params['departureDate1'],
            'departureDate2' => $params['departureDate2'],
            'departureDate3' => $params['departureDate3'],
            'departureDate4' => $params['departureDate4'],
            'preferredTime1' => $params['preferredTime1'],
            'preferredTime2' => $params['preferredTime2'],
            'preferredTime3' => $params['preferredTime3'],
            'preferredTime4' => $params['preferredTime4'],
            'timeWindow' => $params['timewindow'],
            'tripReasonId' => $params['tripReasonId'],
            'tripName' => $params['tripName'],
            'adults' => $params['adults'],
            'children' => $params['children'],
            'infants' => $params['infants'],
            'directFlightsOnly' => $params['directFlightsOnly'],
            'flexibleDates' => $params['flexibleDates'],
            'departureFlexInterval' => $params['departureFlexInterval'],
            'destinationFlexInterval' => $params['destinationFlexInterval'],
            'nearbyAirports' => $params['nearbyAirports'],
            'withoutPenaltiesOnly' => $params['withoutPenaltiesOnly'],
            'prefferedAirlines' => $params['prefferedAirlines'],
            'flightClass' => $params['flightClass'],
            'sessionId' => $params['sessionId'],
            'cabinClasses' => $params['cabinClasses'],
            'additionalEmployees' => $params['additionalEmployees'],
            'guests' => $params['guests'],
            'deepLinkBaseUrl' => $params['deepLinkBaseUrl'],
            'deepLink' => $params['deepLink'],
            'meta' => $params['meta'],
            'fullApiIntegration' => $params['fullApiIntegration'],
            'flightInfo' => $params['flightInfo'],
            'maxNumOfFlights' => $params['maxNumOfFlights'],
            'fareAmount' => $params['fareAmount'],
            'refundableAndChangeableOnly' => $params['refundableAndChangeableOnly'],
            'oWCSearch' => $params['oWCSearch'],
            'travellerInfo' => $params['travellerInfo'],
            'officeId' => $params['officeId']
        ];
        return $this->fetchWithToken($this->cn, $this->url, $this->params);
    }

    /**
     * Gets List of popular places stored in Thomalex csv file
     * @return mixed
     */
    public function getPopularPlaces(): object|array
    {
        $this->url = config('booking.resvoyage.api_url') . "/air/popularplaces";
        return $this->fetchWithToken($this->cn, $this->url);
    }
}
