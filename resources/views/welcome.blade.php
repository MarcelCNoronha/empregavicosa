@extends('layouts.app')

@section('content')
    <div class="container">
        <welcome 
            :user="{{$user}}"
        />
    </div>

    @vite('resources/js/pages/welcome.js')
@endsection