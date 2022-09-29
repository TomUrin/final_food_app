@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">Restaurant information</div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="d-grid gap-2">
                                <a class="btn btn-outline-success mb-2" href="{{route('menu-index')}}">Back to the restaurants list</a>
                            </div>
                        </div>
                    </div>
                    <th scope="col">{{$menu->menu_title}}</th>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Patiekalas</th>
                                <th scope="col">Nuotrauka</th>
                                <th scope="col">Aprašymas</th>
                                <th scope="col">Meniu</th>
                        </thead>
                        @foreach($dish as $men)
                        @if($menu->id == $men->menu_id)
                        <tbody>
                            <td scope="row"> {{$men->dish_title}} </td>
                            <td scope="row">
                                @if($men->image_path)
                                <div class="circle-image mt-4">
                                    <img class="photo-box" src="{{ $men->image_path }}" />
                                </div>
                                @endif
                            </td>
                            <td scope="row"> {{$men->description}} </td>
                            <td scope="row"> {{$men->menuInfo->menu_title}} </td>
                            @endif
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
