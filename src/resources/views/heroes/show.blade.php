@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <h1 class="text-center">{{ $heroes->nickname }}</h1>
            <div class="text-center" style="margin-bottom: 20px;"><img src="{{ asset("images/$heroes->image") }}" style="width: 70%" alt=""></div>
            <div class="">
                <p class="text-left"><span class="myboldFont">Nickname:</span> {{ $heroes->nickname }}</p>
                <p class="text-left"><span class="myboldFont">Real name:</span> {{ $heroes->real_name }}</p>
                <p class=""><span class="myboldFont">Origin description:</span> {{ $heroes->origin_description }}</p>
                <p class=""><span class="myboldFont">Superpowers:</span> {{ $heroes->superpowers }}</p>
                <p class=""><span class="myboldFont">Catchphrase:</span> {{ $heroes->catch_phrase }}</p>
            </div>
        </div>
    </div>
@endsection