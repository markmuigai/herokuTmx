<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Delivery;
use App\User;
use App\Vehicle;
use Auth;
use Mapper;

class DeliveriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //Mapper::map(-1.264, 36.803);
        //Mapper at the users current location
        $location = Mapper::location('Westlands Nairobi');
        $longitude = str_replace(',','.', $location->getLongitude());
        $latitude = str_replace(',','.', $location->getLatitude());
        Mapper::map($latitude, $longitude);
        return view('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //
        $delivery = new Delivery;
        $delivery->user_id = Auth::id();

        //get closest driver to pick up the delivery
        //currently, get a random driver that is available
        $delivery->vehicle_id = Vehicle::where('availability', 'true')->get()->random()->id;

        $delivery->pickupAddress = request('pickAddress');
        //destination address
        $delivery->destAddress = request('destAddress');
        //get the coordinates of pick up location
        //get the coordinates of destination location

        $delivery->packageInfo = request('packageInfo');
        $delivery->packageImg = request('packageImg');
        //assign a driver to the delivery
        //driver = user with a car that is available and in nearest location
        //where user(driver) location is near user(client location)
        //Select the first user who owns a car that is available
        // $delivery->driverId = User::whereHas('vehicle', function($q) {
        //      $q->where('availability', 'true'); // in this scope, `$q` refers to the vehicle object, not the User.
        // })->first()->id;
        //dd($delivery);

        //function to run in php artisan tinker
        // $driver = User::whereHas('vehicle', function($q) { $q->where('availability', 'true');})->first();
        $delivery->save();

        //Get the current delivey's id
        $delivery = Delivery::orderBy('created_at', 'desc')->first();
        //dd($delivery->id);
        //Redirect to get driver
        //return('/mydelivery', compact('delivery'))
        return redirect()->route('mydelivery', ['delivery' => $delivery->id]);
    }

    //Pass the ID for the delivery for the authenticated user where completion status false
    public function mydelivery(Delivery $delivery)
    {
        $delivery = Delivery::find($delivery->id);
        //Driver is equals to the authenticated user's incomplete delivery driver id
        //Find the user whose id is equals to the driver id set in the delivery
        $driver = User::find($delivery->vehicle->user->id);

        //Display the map with a marker to the pickup address
        $location = Mapper::location($delivery->pickupAddress);
        $longitude = str_replace(',','.', $location->getLongitude());
        $latitude = str_replace(',','.', $location->getLatitude());
        Mapper::map($latitude, $longitude);
        return view('Deliveries.mydelivery', compact('delivery', 'driver'));
    }

    //Show drivers a delivery request
    public function deliveryRequest()
    {
        //Get the authenticated users vehicle. How? Get the users vehicle user
        //user->vehicle->delivery
        $deliveries = Delivery::where('vehicle_id', Auth::User()->vehicle->id)->get();
        //dd($deliveries);
        return view('Drivers.toDeliver', compact('deliveries'));
    }

    //When the user confirms the delivery, edit driver details
    public function completeDelivery(Delivery $delivery)
    {
        //Display the form t
    }

    //when the driver finishes the the delivery, edit driver details
    public function setCompleteStatus(Request $request)
    {
        //Edit the delivery table
        //Find the delivery
        //$delivery->status = request('status');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
