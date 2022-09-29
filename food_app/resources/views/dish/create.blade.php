@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">Add new mechanic</div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a class="btn btn-outline-success mb-5" href="{{route('dish-index')}}">Click here to see mechanics list</a>
                    </div>
                    <form class="create" action="{{route('dish-store')}}" method="post" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label for="exampleInputPassword1" class="form-label">Valgiaraštis</label>
                            <div>
                                <select name="menu" class="form-select">
                                    @foreach($menu as $men)
                                    <option value="{{$men->id}}">{{$men->menu_title}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div style="color: crimson;">{{ $errors->first('workshop') }}</div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1" class="form-label">Patiekalas</label>
                            <input name="title" type="text" class="form-control">
                            <div style="color: crimson;">{{ $errors->first('name') }}</div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputPassword1" class="form-label">Aprašymas</label>
                            <input name="description" type="text" class="form-control">
                            <div style="color: crimson;">{{ $errors->first('surname') }}</div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputPassword1" class="form-label">Atvaizdas</label>
                            <input name="food_photo" type="file" class="form-control">
                            <div style="color: crimson;">{{ $errors->first('photo') }}</div>
                        </div>
                        @csrf
                        @method('post')
                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <div class="d-grid gap-2">
                                    <button type="submit" name="submit" value="send" class="btn btn-outline-success mt-5 btn-lg">ADD</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
