<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Menu;
use App\Models\Dish;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
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
        $orders = Order::orderBy('id', 'desc')->get();


        return view('orders.allOrders', [
            'orders' => $orders,
            'statuses' => Order::STATUSES
        
        ]);
    }

    public function setStatus(Request $request, order $order)
    {
        
        $order->status = $request->status;
        $order->save();
        return redirect()->back();
    }

    public function add(Request $request, Restaurant $restaurant)
    {
        
        $restaurant = Restaurant::all();
        $food = Dish::all();

        $order = new Order;
        
        $order->restaurant_id = $request->restaurant_id;
        $order->menu_id = $request->menu_id;
        $order->dish_id = $request->dish_id;
        $order->dish_quantity = $request->addQuantity;
        $order->user_id = Auth::user()->id;

        $order->save();

        return redirect()->route('my-orders', ['restaurant' => $restaurant, 'food' => $food]);

    }

    public function showMyOrders()
    {
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        $food = Dish::all();
       
        return view('orders.index', [
            'food' => $food,
            'orders' => $orders,
            'statuses' => Order::STATUSES
        ]);
    }

    public function pick(Request $request)
    {
        $food = match($request->sort) {
            'hotels-asc' => Dish::orderBy('price', 'asc')->get(),
            'hotels-desc' => Dish::orderBy('price', 'desc')->get(),
            default => Dish::all()
        };
        $restaurant = Restaurant::all();
        
       return redirect()->route('my-orders', ['food' => $food, 'restaurant' => $restaurant]);
    }
}