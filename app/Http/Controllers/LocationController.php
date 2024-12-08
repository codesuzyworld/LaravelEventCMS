<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        return view('locations.list', [
            'locations' => Location::all()
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function addForm()
    {

        return view('locations.add');
    }


    public function add()
    {

        $attributes = request()->validate([
            'name' => 'required',
            'address' => 'required',
            'gMapLink' => 'required',
        ]);

        $location = new Location();
        $location->name = $attributes['name'];
        $location->address = $attributes['address'];
        $location->gMapLink = $attributes['gMapLink'];
        $location->save();

        return redirect('/console/types/list')
            ->with('message', 'Location has been added!');
    }

    public function edit(Location $location)
    {

        $attributes = request()->validate([
            'name' => 'required',
            'address' => 'required',
            'gMapLink' => 'required',
        ]);

        $location->name = $attributes['name'];
        $location->address = $attributes['address'];
        $location->gMapLink = $attributes['gMapLink'];
        $location->save();

        return redirect('/console/locations/list')
            ->with('message', 'Location has been edited!');
    }

    public function delete(Location $location)
    {
        $location->delete();
        
        return redirect('/console/locations/list')
            ->with('message', 'Location has been deleted!');        
    }
}
