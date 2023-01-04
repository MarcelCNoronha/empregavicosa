@extends('layouts.app')

@section('content')
    <div class="container">
        <welcome-details 
            :publication="{{$publication}}"
        />
    </div>

    @vite('resources/js/pages/welcome-details.js')
@endsection