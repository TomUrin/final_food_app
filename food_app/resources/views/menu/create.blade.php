@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">Add new menu</div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a class="btn btn-outline-success mb-5" href="{{route('menu-index')}}">Click here to see menus list</a>
                    </div>
                    <form class="create" action="{{route('menu-store')}}" method="post" type="submit">
                    <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Restaurant</label>
                            <select name="restaurant_id" class="form-select">
                                    @foreach($restaurant as $res)
                                    <option value="{{$res->id}}">{{$res->title}}
                                    </option>
                                    @endforeach
                                </select>
                            <div style="color: crimson;">{{ $errors->first('title') }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Menu</label>
                            <input name="menu" type="text" class="form-control">
                            <div style="color: crimson;">{{ $errors->first('title') }}</div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <div class="d-grid gap-2">
                                    <button type="submit" name="submit" value="send" class="btn btn-outline-success mt-5 btn-lg">ADD</button>
                                </div>
                            </div>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection