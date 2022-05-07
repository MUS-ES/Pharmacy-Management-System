@extends("layouts.main")
@section('head')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection
@section('title', 'Admin Login')
@section('content')
    <div class="box">
        <div class="heading">
            <h2>Admin Login Form</h2>
        </div>
        <div class="inner-box">
            <div class="login-image">
                <img src="{{ asset('images/admin/login.jpg') }}" alt="">
            </div>


            <div class="form-wrapper">
                <form action="{{ route('admin.login') }}" method="POST" onsubmit="return validate();">
                    @csrf
                    <div class="form-input-field">
                        <input autocomplete="off" id="Email" name="email" class="user-input" type="text"
                            placeholder="Username" onkeyup="validateEmail(this.value,'Email-error')">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <span class="error" id="Email-error"></span>
                    </div>
                    <div class="form-input-field">
                        <input id="password" name="password" autocomplete="new-password" class="user-input"
                            type="password" onkeyup="validatePassword(this.value,'password-error')" placeholder="Password">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <span class="error" id="password-error"></span>
                    </div>
                    <div class="form-tail">

                        <input type="submit" value="LOGIN">
                        @if (count($errors) > 0)
                            <span id="login-error">Credinatails is not correct</span>
                        @endif

                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/validation.js') }}"></script>
@endsection
