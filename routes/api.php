<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AirController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//---------------->Air
Route::prefix('air')->group(function () {
    //---------------->Airlines
    Route::prefix('airlines')->group(function () {
        Route::get('/', [AirController::class, 'index']);
    });

    //---------------->Airports
    Route::prefix('airports')->group(function () {
        Route::get('/', [AirController::class, 'getAirports']);
        Route::get('/nearby', [AirController::class, 'getAirportsNearBy']);
    });

    //---------------->Flights
    Route::prefix('flights')->group(function () {
        Route::get('/rules', [AirController::class, 'displayFlightRules']);
        Route::get('/meals', [AirController::class, 'flightMeals']);
        Route::get('/upsell', [AirController::class, 'getAirUpSell']);
        Route::get('/branded-fare', [AirController::class, 'getFare']);
        Route::get('/roundtrip', [AirController::class, 'roundTrip']);
        Route::get('/oneway', [AirController::class, 'oneWayTrip']);
        Route::get('/multicity', [AirController::class, 'multiCityTrip']);
        Route::get('/flexibletrip', [AirController::class, 'flexibleTrip']);
        Route::get('/storeflight', [AirController::class, 'storeFlight']);
    });
});
