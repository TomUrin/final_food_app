@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">Pasirink restoraną</div>
                <div class="card-body">
                    <form class="create" action="{{route('pickFood-add')}}" method="post" type="submit" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="createServices">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Restoranas</label>
                                <div>
                                    <select name="restaurant_id" class="form-select">
                                        @foreach($restaurant as $key => $res)
                                        <option value="{{$res->id}}">{{$res->title}}
                                        </option>
                                        <button type="submit" class="btn btn-primary btn-sm ms-3 mt-2">Būsenos pakeitimas</button>
                                        @endforeach
                                    </select>
                                </div>
                                <div style="color: crimson;">{{ $errors->first('workshop') }}</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Meniu</label>
                                <div>
                                    <select name="menu_id" class="form-select">
                                        @foreach($menu as $m)
                                        <option value="{{$m->id}}">
                                            {{$m->menu_title}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Patiekalas</label>
                                    <div>
                                        <select name="dish_id" class="form-select">
                                            @foreach($food as $f)
                                            <option value="{{$f->id}}">{{$f->dish_title}} 
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-3">
                                            <div class="d-grid gap-3">
                                                <label class="row justify-content-center mt-4" for="quantity">Įveskite kiekį:</label>
                                                <input class="form-label" type="number" id="quantity" name="addQuantity" min="1" max="10">
                                            </div>
                                        </div>
                                    </div>

                                    <div style="color: crimson;">{{ $errors->first('workshop') }}</div>
                                </div>
                            </div>
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
