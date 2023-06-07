<?php

namespace App\Http\Controllers;

use App\Models\Air;
use App\Http\Requests\GetAirlinesRequest;
use App\Http\Requests\GetAirportsRequest;
use App\Http\Requests\GetNearByAirportsRequest;
use App\Http\Requests\AirSessionRequest;
use App\Http\Requests\MultiCityRequest;
use App\Http\Requests\OneWayRequest;
use App\Http\Requests\RoundTripRequest;
use App\Http\Requests\FlexibleRoundTripRequest;
use App\JussegBooking\Resvoyage\Air\Airline;

class AirController extends Controller
{
    /**
     * Display all Airlines based on search keywords.
     */
    public function index(GetAirlinesRequest $request): object|array
    {
        return response()->json((new Airline)->getAirlines($request), 200);
    }

    /**
     * Display all Airlines based on search keywords.
     */
    public function getAirports(GetAirportsRequest $request): object|array
    {
        return response()->json((new Airline)->getAirlines($request), 200);
    }

    /**
     * Display all Nearby Airpots based on geo-location co-ordinates.
     */
    public function getAirportsNearBy(GetNearByAirportsRequest $request): object|array
    {
        return response()->json((new Airline)->getNearByAirports($request), 200);
    }

    /**
     * Display flight / air rules.
     */
    public function displayFlightRules(AirSessionRequest $request): object|array
    {
        return response()->json((new Airline)->getNearByAirports($request), 200);
    }

    /**
     * Display api upsell.
     * @param AirSessionRequest $request
     */
    public function getAirUpSell(AirSessionRequest $request)
    {
        return response()->json((new Airline)->getNearByAirports($request), 200);
    }

    /**
     * Display branded fare.
     * @param AirSessionRequest $request
     */
    public function getFare(AirSessionRequest $request)
    {
        return response()->json((new Airline)->getBrandedFare($request), 200);
    }

    /**
     * Display flights for round trips.
     * @param RoundTripRequest $request
     */
    public function roundTrip(RoundTripRequest $request): object|array
    {
        return response()->json((new Airline)->searchFlight($request), 200);
    }

    /**
     * Display flights for one way trips.
     *  @param OneWayRequest $request
     */
    public function oneWayTrip(OneWayRequest $request): object|array
    {
        return response()->json((new Airline)->searchFlight($request), 200);
    }

    /**
     * Display flights for multicity trips.
     * @param MultiCityRequest $request
     */

    public function multiCityTrip(MultiCityRequest $request): object|array
    {
        return response()->json((new Airline)->searchFlight($request), 200);
    }

    /**
     * Display flights for flexible round trips.
     * @param FlexibleRoundTripRequest $request
     */

    public function flexibleTrip(FlexibleRoundTripRequest $request): object|array
    {
        return response()->json((new Airline)->searchFlight($request), 200);
    }

    /**
     * Display flights for flexible round trips.
     */

    public function flightMeals()
    {
        return response()->json((new Airline)->getMealsOption(), 200);
    }

    /**
     * Add flights to cart.
     * @param StoreFlightsRequest $request
     */

    public function storeFlight(AirSessionRequest $request): object|array
    {
        return response()->json((new Airline)->addFlightToCart($request), 200);

        //add to database
    }
}
