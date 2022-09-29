@extends('layouts.app')

@section('title')
Meniu
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            {{-- @include('front.box') --}}
            <div class="card">
                <div class="card-header">Meniu</div>
                <div class="card-body">
                    @if (Auth::user()->role > 9)
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="d-grid gap-2">
                                <a class="btn btn-outline-success mb-2" href="{{route('menu-create')}}">Paspauskite norint pridėti naują meniu</a>
                            </div>
                        </div>
                    </div>
                    @endif
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Meniu</th>
                                <th scope="col">Veiksmai</th>
                        </thead>
                        @foreach($menus as $menu)
                        <tbody>
                            <tr>
                                <td scope="row"> {{$menu->menu_title}} </td>
                                @if (Auth::user()->role > 9)
                                <td scope="row" class="actions">
                                    <a class="btn btn-outline-warning btn-sm me-2 " href="{{route('menu-edit', $menu)}}">REDAGUOTI</a>
                                    <a class="btn btn-outline-info btn-sm me-2 " href="{{route('menu-show', $menu->id)}}">RODYTI</a>
                                    <form method="POST" action="{{route('menu-delete', $menu)}}">
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
