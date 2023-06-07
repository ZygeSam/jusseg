<?php

namespace App\JussegBooking\Resvoyage\Air;

use App\JussegBooking\Resvoyage\Auth\AccessToken;
use App\Traits\ApiResponseTrait;
use App\Traits\CurlableTrait;
use App\Traits\RequestArrayTrait;

class Airline extends AccessToken
{
    use ApiResponseTrait;
    use RequestArrayTrait;
    use CurlableTrait;

    private $cn;
    private $url;
    private $params;

    public function __construct()
    {
        $this->cn = array(
            "Authorization: Bearer " . $this->getToken(),
            "Content-Type: application/json"
        );
    }

    /**
     * Gets airlines
     * @return mixed
     */
    public function getAirlines($params): object|array
    {
        $this->params = $this->arrayParams([
            'search' => $params['search'] ?? '',
            'count' => $params['count'] ?? ''
        ]);
        $this->url = config('booking.resvoyage.api_url') . "/air/references/airlines?" . http_build_query($this->params);
        return $this->curl($this->cn, $this->url);
    }

    /**
     * Gets all meals option
     * @return mixed
     */
    public function getMealsOption(): object|array|string
    {
        $this->url = config('booking.resvoyage.api_url') . "/air/references/meals";
        return $this->curl($this->cn, $this->url);
    }

    /**
     * Gets nearby airports to location
     * @return mixed
     */
    public function getNearByAirports($params): object|array
    {
        $this->params = $this->arrayParams([
            'longitude' => $params['long'] ?? '',
            'latitude' => $params['lat'] ?? ''
        ]);
        $this->url = config('booking.resvoyage.api_url') . "/air/references/nearby?" . http_build_query($this->params);
        return $this->curl($this->cn, $this->url);
    }

    /**
     * Gets list of all airports
     * @return mixed
     */
    public function getAirports($params): object|array
    {
        $this->params = $this->arrayParams([
            'search' => $params['search'] ?? 'ba',
            'code' => $params['code'] ?? '',
            'count' => $params['count'] ?? '',
            'isDeparture' => $params['isDeparture'] ?? true
        ]);
        $this->url = config('booking.resvoyage.api_url') . "/air/references/airports?" . http_build_query($this->params);
        return $this->curl($this->cn, $this->url);
    }

    /**
     * Gets flight purchase conditions
     * @return mixed
     */
    public function getFlightRules($params): object|array|string
    {
        $this->params = $this->arrayParams([
            'sessionId' => $params["sessionId"] ?? '',
            'itineraryId' => $params["itineraryId"] ?? ''
        ]);
        $this->url = config('booking.resvoyage.api_url') . "/air/references/flight/rules?" . http_build_query($this->params);
        return $this->curl($this->cn, $this->url);
    }

    /**
     * Search for flights based on criterias
     * @return mixed
     */
    public function searchFlight($params): object|array|string
    {
        $this->params = $this->arrayParams([
            'from1' => $params['from1'] ?? '',
            'from2' => $params['from2'] ?? '',
            'from3' => $params['from3'] ?? '',
            'from4' => $params['from4'] ?? '',
            'to1' => $params['to1'] ?? '',
            'to2' => $params['to2'] ?? '',
            'to3' => $params['to3'] ?? '',
            'to4' => $params['to4'] ?? '',
            'DepartureDate1' => $params['DepartureDate1'] ?? '',
            'DepartureDate2' => $params['DepartureDate2'] ?? '',
            'DepartureDate3' => $params['DepartureDate3'] ?? '',
            'DepartureDate4' => $params['DepartureDate4'] ?? '',
            'PreferredTime1' => $params['PreferredTime1'] ?? '',
            'PreferredTime2' => $params['PreferredTime2'] ?? '',
            'PreferredTime3' => $params['PreferredTime3'] ?? '',
            'PreferredTime4' => $params['PreferredTime4'] ?? '',
            // 'timeWindow' => $params['timewindow'] ?? '',
            // 'tripReasonId' => $params['tripReasonId'] ?? '',
            // 'tripName' => $params['tripName'] ?? '',
            'Adults' => $params['Adults'] ?? '',
            'Children' => $params['Children'] ?? '',
            'Infants' => $params['Infants'] ?? '',
            // 'directFlightsOnly' => $params['directFlightsOnly'] ?? '',
            // 'flexibleDates' => $params['flexibleDates'] ?? '',
            // 'departureFlexInterval' => $params['departureFlexInterval'] ?? '',
            // 'destinationFlexInterval' => $params['destinationFlexInterval'] ?? '',
            // 'nearbyAirports' => $params['nearbyAirports'] ?? '',
            // 'withoutPenaltiesOnly' => $params['withoutPenaltiesOnly'] ?? '',
            // 'prefferedAirlines' => $params['prefferedAirlines'] ?? '',
            'FlightClass' => $params['FlightClass'] ?? '',
            // 'sessionId' => $params['sessionId'] ?? '',
            // 'cabinClasses' => $params['cabinClasses'] ?? '',
            // 'additionalEmployees' => $params['additionalEmployees'] ?? '',
            // 'guests' => $params['guests'] ?? '',
            // 'deepLinkBaseUrl' => $params['deepLinkBaseUrl'] ?? '',
            // 'deepLink' => $params['deepLink'] ?? '',
            // 'meta' => $params['meta'] ?? '',
            // 'fullApiIntegration' => $params['fullApiIntegration'] ?? '',
            // 'flightInfo' => $params['flightInfo'] ?? '',
            // 'maxNumOfFlights' => $params['maxNumOfFlights'] ?? '',
            // 'fareAmount' => $params['fareAmount'] ?? '',
            // 'refundableAndChangeableOnly' => $params['refundableAndChangeableOnly'] ?? '',
            // 'oWCSearch' => $params['oWCSearch'] ?? '',
            // 'travellerInfo' => $params['travellerInfo'] ?? '',
            // 'officeId' => $params['officeId'] ?? ''
        ]);
        $this->url = str_replace('+', '', config('booking.resvoyage.api_url') . "/air/search?" . http_build_query($this->params));
        return $this->curl($this->cn, $this->url);
    }

    /**
     * Gets FareFamilies(Branded Fare) from Amadeus
     * @return mixed
     */
    public function getBrandedFare($params): object|array
    {
        $this->params = $this->arrayParams([
            'sessionId' => $params["sessionId"],
            'itineraryId' => $params["itineraryId"]
        ]);
        $this->url = config('booking.resvoyage.api_url') . "/air/upsell?" . http_build_query($this->params);
        return $this->curl($this->cn, $this->url);
    }

    /**
     * Add flight to cart from a deep link selection
     * @return mixed
     */
    public function addFlightToCart($params): object|array
    {
        // $this->params = [
        //     'from1' => $params['from1'],
        //     'from2' => $params['from2'],
        //     'from3' => $params['from3'],
        //     'from4' => $params['from4'],
        //     'to1' => $params['to1'],
        //     'to2' => $params['to2'],
        //     'to3' => $params['to3'],
        //     'to4' => $params['to4'],
        //     'DepartureDate1' => $params['DepartureDate1'],
        //     'DepartureDate2' => $params['DepartureDate2'],
        //     'DepartureDate3' => $params['DepartureDate3'],
        //     'DepartureDate4' => $params['DepartureDate4'],
        //     'PreferredTime1' => $params['PreferredTime1'],
        //     'PreferredTime2' => $params['PreferredTime2'],
        //     'PreferredTime3' => $params['PreferredTime3'],
        //     'PreferredTime4' => $params['PreferredTime4'],
        //     'timeWindow' => $params['timewindow'],
        //     'tripReasonId' => $params['tripReasonId'],
        //     'tripName' => $params['tripName'],
        //     'Adults' => $params['Adults'],
        //     'Children' => $params['Children'],
        //     'Infants' => $params['Infants'],
        //     'DirectFlightsOnly' => $params['DirectFlightsOnly'],
        //     'FlexibleDates' => $params['FlexibleDates'],
        //     'DepartureFlexInterval' => $params['DepartureFlexInterval'],
        //     'DestinationFlexInterval' => $params['DestinationFlexInterval'],
        //     'NearbyAirports' => $params['NearbyAirports'],
        //     'WithoutPenaltiesOnly' => $params['WithoutPenaltiesOnly'],
        //     'PrefferedAirlines' => $params['PrefferedAirlines'],
        //     'FlightClass' => $params['FlightClass'],
        //     'sessionId' => $params['sessionId'],
        //     'cabinClasses' => $params['cabinClasses'],
        //     'additionalEmployees' => $params['additionalEmployees'],
        //     'guests' => $params['guests'],
        //     'deepLinkBaseUrl' => $params['deepLinkBaseUrl'],
        //     'deepLink' => $params['deepLink'],
        //     'meta' => $params['meta'],
        //     'fullApiIntegration' => $params['fullApiIntegration'],
        //     'flightInfo' => $params['flightInfo'],
        //     'maxNumOfFlights' => $params['maxNumOfFlights'],
        //     'fareAmount' => $params['fareAmount'],
        //     'refundableAndChangeableOnly' => $params['refundableAndChangeableOnly'],
        //     'oWCSearch' => $params['oWCSearch'],
        //     'travellerInfo' => $params['travellerInfo'],
        //     'officeId' => $params['officeId']
        // ];
        $this->params = $this->arrayParams([
            'sessionId' => $params["sessionId"],
            'itineraryId' => $params["itineraryId"]
        ]);
        $this->url = config('booking.resvoyage.api_url') . "/air/cart/add";
        return $this->curl($this->cn, $this->url, $this->$params);
    }

    /**
     * Add promotional discount to flight session
     * @return mixed
     */
    public function addPromoDiscount($params): object|array
    {
        $this->params = $this->arrayParams([
            'sessionId' => $params["sessionId"],
            'promocode' => $params["promocode"]
        ]);
        $this->url = str_replace('+', '', config('booking.resvoyage.api_url') . "/cart/promotionaldiscount/?" . http_build_query($this->params));
        return $this->curl($this->cn, $this->url, $this->$params);
    }

    /**
     * Remove promotional discount to flight session
     * @return mixed
     */
    public function removePromoDiscount($params): object|array
    {
        $this->params = $this->arrayParams([
            'sessionId' => $params["sessionId"]
        ]);
        $this->url = str_replace('+', '', config('booking.resvoyage.api_url') . "/cart/promotionaldiscount/remove/?" . http_build_query($this->params));
        return $this->curl($this->cn, $this->url, $this->$params);
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

    /**
     * Gets airlines logo
     * @return mixed
     */
    public function getAirlineLogo($code)
    {
        $this->url = config('booking.resvoyage.api_url') . "/air/references/airline/$code/logo";
        return $this->curl($this->cn, $this->url);
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
        return $this->fetchWithToken($this->getToken(), $this->url);
    }

    /**
     * Cache list of all airports
     * @return mixed
     */
    public function cacheAirports(): object|array
    {
        $this->url = config('booking.resvoyage.api_url') . "/air/references/airports/cache";
        return $this->curl($this->cn, $this->url);
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
}
