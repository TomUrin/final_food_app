@extends('layouts.app')

@section('title')
Restoranai
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            {{-- @include('front.box') --}}
            <div class="card">
                <div class="card-header">Restoranų sąrašas</div>
                <div class="card-body">
                    @if (Auth::user()->role > 9)
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="d-grid gap-2">
                                <a class="btn btn-outline-success mb-2" href="{{route('restaurant-create')}}">Paspausti čia norint pridėti restoraną</a>
                            </div>
                        </div>
                    </div>
                    @endif
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Restoranas</th>
                                <th scope="col">Kodas</th>
                                <th scope="col">Adresas</th>
                                <th scope="col">Veiksmai</th>
                        </thead>
                        @foreach($restaurants as $restaurant)
                        <tbody>
                            <tr>
                                <td scope="row"> {{$restaurant->title}} </td>
                                <td scope="row"> {{$restaurant->code}} </td>
                                <td scope="row"> {{$restaurant->address}} </td>
                                @if (Auth::user()->role > 9)
                                <td scope="row" class="actions">
                                    <a class="btn btn-outline-warning btn-sm me-2 " href="{{route('restaurant-edit', $restaurant)}}">EDIT</a>
                                    <form method="POST" action="{{route('restaurant-delete', $restaurant)}}">
                                        <button class="btn btn-outline-danger btn-sm mt-2" type="submit">DELETE</button>
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
