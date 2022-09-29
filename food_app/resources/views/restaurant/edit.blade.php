@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">Edit restaurant information</div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="d-grid gap-2">
                                <a class="btn btn-outline-success mb-2" href="{{route('restaurant-index')}}">Back to the restaurants list</a>
                            </div>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Restaurant</th>
                                <th scope="col">Code</th>
                                <th scope="col">Address</th>
                            </tr>
                        </thead>
                        <form method="post" action="{{route('restaurant-update', $restaurant)}}">
                            <tbody>
                                <tr>
                                    <td scope="row">
                                        <div class="input-group input-group-sm mb-3">
                                            <input name="newTitle" type="text" class="form-control" value="{{$restaurant->title}}">
                                        </div>
                                    </td>
                                    <td scope="row">
                                        <div class="input-group input-group-sm mb-3">
                                            <input name="newCode" type="text" class="form-control" value="{{$restaurant->code}}">
                                        </div>
                                    </td>
                                    <td scope="row">
                                        <div class="input-group input-group-sm mb-3 col-2">
                                            <input name="newAddress" type="text" class="form-control" value="{{$restaurant->address}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="mx-auto">
                                            <button type="submit" name="submit" value="send" class="btn btn-outline-success btn-sm">EDIT</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            @csrf
                            @method('put')
                        </form>
                    </table>
                    @if ($errors->any())
<div class="w-4/8 m-auto text-center">
    @foreach ($errors->all() as $error)
    <li class="text-danger list-none">
        {{ $error }}
    </li>
    @endforeach
</div>
@endif
                    @endsection
