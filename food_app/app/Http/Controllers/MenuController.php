<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class MenuController extends Controller
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
        $menus = match($request->sort) {
            'menus-asc' => Menu::orderBy('title', 'asc')->get(),
            'menus-desc' => Menu::orderBy('title', 'desc')->get(),
            default => Menu::all()
        };
        return view('menu.index', ['menus' => $menus]);//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurant = Restaurant::all();
        return view('menu.create', ['restaurant' => $restaurant]);
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
            'menu' => 'required',
        ]);
        
        $menu = new Menu;
        $menu->restaurant_id = $request->restaurant_id;
        $menu->menu_title = $request->menu;

        $menu->save();
        return redirect()->route('menu-index')->with('success', 'Menu successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(int $menuId)
    {
        $dish = Dish::all();
        $menu = Menu::where('id', $menuId)->first();
        return view('menu.show', ['menu' => $menu, 'dish' => $dish]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('menu.edit', ['menu' => $menu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $menu->menu_title = $request->newTitle;
        $menu->save();
        return redirect()->route('menu-index')->with('infoUpdate', 'Menu information have been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menu-index')->with('deleted', 'Menu information successfully deleted.');
    }
}
