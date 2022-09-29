@extends('layouts.app')

@section('title')
Valgiaraštis
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            {{-- @include('front.box') --}}
            <div class="card">
                <div class="card-header">Patiekalai</div>
                <div class="card-body">
                    @if (Auth::user()->role > 9)
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="d-grid gap-2">
                                <a class="btn btn-outline-success mb-2" href="{{route('dish-create')}}">Paspauskite norint pridėti naują patiekalą</a>
                            </div>
                        </div>
                    </div>
                    @endif
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Patiekalas</th>
                                <th scope="col">Nuotrauka</th>
                                <th scope="col">Aprašymas</th>
                                <th scope="col">Meniu</th>
                                <th scope="col">Veiksmai</th>
                        </thead>
                        @foreach($foods as $food)
                        <tbody>
                            <tr>
                                <td scope="row"> {{$food->dish_title}} </td>
                                <td scope="row">
                                    @if($food->image_path)
                                    <div class="circle-image mt-4">
                                        <img class="photo-box" src="{{ $food->image_path }}" />
                                    </div>
                                    @endif
                                </td>
                                <td scope="row"> {{$food->description}} </td>
                                <td scope="row"> {{$food->menuInfo->menu_title}} </td>
                                @if (Auth::user()->role > 9)
                                <td scope="row" class="actions">
                                    <a class="btn btn-outline-warning btn-sm me-2 " href="{{route('dish-edit', $food)}}">REDAGUOTI</a>
                                    <form method="POST" action="{{route('dish-delete', $food)}}">
                                        <button class="btn btn-outline-danger btn-sm mt-2" type="submit">TRINTI</button>
                                </td>
                                @endif
                            </tr>
                        </tbody>
                        @csrf
                        @method('delete')
                        </form>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
