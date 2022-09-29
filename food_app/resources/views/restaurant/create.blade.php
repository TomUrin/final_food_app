@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">Add new Restaurant</div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a class="btn btn-outline-success mb-5" href="{{route('restaurant-index')}}">Click here to see restaurants list</a>
                    </div>
                    <form class="create" action="{{route('restaurant-store')}}" method="post" type="submit">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Restaurant</label>
                            <input name="restaurant" type="text" class="form-control">
                            <div style="color: crimson;">{{ $errors->first('title') }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Code</label>
                            <input name="code" type="text" class="form-control">
                            <div style="color: crimson;">{{ $errors->first('title') }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Address</label>
                            <input name="address" type="text" class="form-control">
                            <div style="color: crimson;">{{ $errors->first('seasonStart') }}</div>
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
