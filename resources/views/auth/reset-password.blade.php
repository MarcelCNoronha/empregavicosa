@extends('layouts.app')

@section('content')
    <div class="container">
        <reset-password 
            :token="{{json_encode($token)}}"
            :email="{{json_encode($email)}}"
        />
    </div>
    
    @vite('resources/js/pages/reset-password.js')
@endsection