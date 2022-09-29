@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">Edit menu information</div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="d-grid gap-2">
                                <a class="btn btn-outline-success mb-2" href="{{route('menu-index')}}">Back to the menus list</a>
                            </div>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Menu</th>
                                
                            </tr>
                        </thead>
                        <form method="post" action="{{route('menu-update', $menu)}}">
                            <tbody>
                                <tr>
                                    <td scope="row">
                                        <div class="input-group input-group-sm mb-3">
                                            <input name="newTitle" type="text" class="form-control" value="{{$menu->menu_title}}">
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
                    @endsection
