<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Validator;

class RestaurantController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $restaurants = match($request->sort) {
            'restaurants-asc' => Restaurant::orderBy('title', 'asc')->get(),
            'restaurants-desc' => Restaurant::orderBy('title', 'desc')->get(),
            default => Restaurant::all()
        };
        return view('restaurant.index', ['restaurants' => $restaurants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'restaurant' => 'required',
            'code' => 'required|numeric',
            'address' => 'required',
        ]);

        $restaurant = new Restaurant;

        $restaurant->title = $request->restaurant;
        $restaurant->code = $request->code;
        $restaurant->address = $request->address;

        $restaurant->save();
        return redirect()->route('restaurant-index')->with('success', 'Restaurant successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(int $restaurantId)
    {
        $restaurant = Restaurant::where('id', $restaurantId)->first();
        return view('restaurant.show', ['restaurant' => $restaurant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        return view('restaurant.edit', ['restaurant' => $restaurant]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {


        $restaurant->title = $request->newTitle;
        $restaurant->code = $request->newCode;
        $restaurant->address = $request->newAddress;
        $restaurant->save();
        return redirect()->route('restaurant-index')->with('infoUpdate', 'Restaurant information have been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return redirect()->route('restaurant-index')->with('deleted', 'Restaurant information successfully deleted.');
    }
}
