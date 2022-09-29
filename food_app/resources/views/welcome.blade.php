@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Sveiki atvykę') }}</div>
                <div class="card-body">
                    {{ __('Norėdami pradėti, prisijunkite arba užsiregistruokite') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection