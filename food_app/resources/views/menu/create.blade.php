@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">Pridėti naują valgiaraštį</div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a class="btn btn-outline-success mb-5" href="{{route('menu-index')}}">Paspauskite norėdami pamatyti valgiaraščių sąrašą</a>
                    </div>
                    <form class="create" action="{{route('menu-store')}}" method="post" type="submit">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Restoranas</label>
                            <select name="restaurant_id" class="form-select">
                                @foreach($restaurant as $res)
                                <option value="{{$res->id}}">{{$res->title}}
                                </option>
                                @endforeach
                            </select>
                            <div style="color: crimson;">{{ $errors->first('title') }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Valgiaraštis</label>
                            <input name="menu" type="text" class="form-control">
                            <div style="color: crimson;">{{ $errors->first('title') }}</div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <div class="d-grid gap-2">
                                    <button type="submit" name="submit" value="send" class="btn btn-outline-success mt-5 btn-lg">Pridėti</button>
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
