<?php

namespace App\Http\Controllers;

use App\Models\Airports;
use Illuminate\Http\Request;
use App\Traits\CurlableTrait;

class AirportsController extends Controller
{
    use CurlableTrait;
    private $cn;
    private $url;

    public function __construct()
    {
        $this->cn = array(
            "Content-Type: application/json"
        );
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "Hi";
        $this->url = "https://raw.githubusercontent.com/mwgg/Airports/master/airports.json";
        return $this->curl($this->cn, $this->url);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Airports $airports)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Airports $airports)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Airports $airports)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Airports $airports)
    {
        //
    }
}
