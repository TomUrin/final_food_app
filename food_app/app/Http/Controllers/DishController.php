<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Menu;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $foods = Dish::all(); 
        return view('dish.index', ['foods' => $foods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dishes = Dish::all();
        $menu = Menu::all();
        return view('dish.create', ['menu' => $menu, 'dishes' => $dishes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request   $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $food = new Dish;

        if ($request->file('food_photo')) {
            $photo = $request->file('food_photo');
            $ext = $photo->getClientOriginalExtension();
            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $file = $name . '-' . rand(100000, 999999) . '.' . $ext;
            $photo->move(public_path() . '/images', $file);
            $food->image_path = asset('/images') . '/' . $file;
        }
        
        $food->dish_title = $request->title;
        $food->description = $request->description;
        $food->quantity = 0;
        $food->menu_id = $request->menu;

        $food->save();
        return redirect()->route('dish-index')->with('success', 'Mechanics information successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        $menus = Menu::all();
        return view('dish.edit', ['dish' => $dish, 'menus' => $menus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        if ($request->file('food_photo')) {
            if ($dish->image_path) {
            $name = pathinfo($dish->image_path, PATHINFO_FILENAME);
            $ext = pathinfo($dish->image_path, PATHINFO_EXTENSION);
            $path = public_path('/images') . '/' . $name . '.' . $ext;

            if (file_exists($path)) {
                unlink($path);
            }
        }
        
            $photo = $request->file('food_photo');
            $ext = $photo->getClientOriginalExtension();
            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $file = $name . '-' . rand(100000, 999999) . '.' . $ext;
            $photo->move(public_path() . '/images', $file);
            $dish->image_path = asset('/images') . '/' . $file;
            

        }

        

        $dish->dish_title = $request->newTitle;
        $dish->description = $request->newDescription;
        $dish->menu_id = $request->newMenu;
        
        $dish->save();
        return redirect()->route('dish-index')->with('infoUpdate', 'Mechanics information have been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        if($dish->image_path) {
            $name = pathinfo($dish->image_path, PATHINFO_FILENAME);
            $ext = pathinfo($dish->image_path, PATHINFO_EXTENSION);
            $path = public_path('/images') . '/' . $name . '.' . $ext;
    
            if(file_exists($path)) 
            {
                unlink($path);
            }
        }
        $dish->delete();
        return redirect()->route('dish-index')->with('deleted', 'Mechanics information successfully deleted.');
    }

    public function pick(Request $request)
    {

        $food = Dish::all(); 
        $restaurant = Restaurant::all();
        $menu = Menu::all();
        
      
        return view('orders.pick', ['food' => $food, 'restaurant' => $restaurant, 'menu' => $menu]);
    }
}
