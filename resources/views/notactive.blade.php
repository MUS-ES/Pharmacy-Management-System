@extends("layouts.main")
@section('head')
    <link rel="stylesheet" href="{{ asset('css/notactive.css') }}">
@endsection
@section('title', 'Account Disabled')

@section('content')
    <div class="overlay"></div>
    <div class="title">

        <h3 class="not-active-title">Your Account Has Not Been Activated Yet ! Please Wait While We Check Your Data Or Contact With Admin</h3>
        <a href="{{ route('signout') }}">Sign out</a>
    </div>
@endsection
