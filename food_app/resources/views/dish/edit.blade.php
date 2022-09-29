@extends('layouts.app')
@push('styles')
<link href="{{mix('resources/sass/mechanicCard.scss')}}" rel="stylesheet">
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">Redaguoti patiekalo informaciją</div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a class="btn btn-outline-success mb-2" href="{{route('dish-index')}}">Grižti prie patiekalų sąrašo</a>
                    </div>
                    <form method="post" action="{{route('dish-update', $dish)}}" enctype="multipart/form-data">
                        
                        @if (Auth::user()->role > 9)
                        <div class="form-group mt-4">
                            <label>Patiekalo pavadinimas</label>
                            <input name="newTitle" type="text" class="form-control" value="{{$dish->dish_title}}">
                            <div class="form-group mt-4">
                                <label for="exampleInputPassword1" class="form-label">Meniu</label>
                            <div>
                                <select name="newMenu" class="form-select">
                                
                                    @foreach($menus as $menu)
                                    <option value="{{$menu->id}}" @if($menu->id == $dish->menu_id) selected @endif>{{$menu->menu_title}}
                                    </option>
                                    @endforeach
                                   
                                </select>
                            </div>
                            </div>
                            <div class="form-group mb-3">
                            <label for="exampleInputEmail1" class="form-label">Aprašymas</label>
                            <input name="newDescription" type="text" class="form-control" value="{{$dish->description}}">
                            <div style="color: crimson;">{{ $errors->first('price') }}</div>
                        </div>
                        
                            <div class="form-group mt-4">
                                <label>Atvaizdas</label>
                                <div>
                                    <img class="photo-box" src="{{ $dish->image_path }}" />
                                    <input name="food_photo" type="file" class="form-control">
                                </div>
                            </div>
                            <div class="mx-auto mt-4">
                                <button type="submit" name="submit" value="send" class="btn btn-outline-success btn-sm">REDAGUOTI</button>
                            </div>
                            @endif
                @csrf
                @method('put')
                </form>
                @if (Auth::user()->role < 9) @if($dish->image_path)
                    <form method="post" action="{{route('dish-delete-picture', $dish)}}" enctype="multipart/form-data">
                        <button type="submit" class="btn btn-outline-danger btn-sm">Delete photo</button>
                        @csrf
                        @method('put')
                    </form>
                    @endif
                    @endif
                    
                    @endsection

