<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/forget_password.css') }}">
    <title>Forget Password</title>
</head>

<body>

    <div class="container">
<h2>Forget Your Password</h2>
@if(session('status') )
<p class="status">{{session('status')}}</p>

@endif


        <form action="{{ route('password.email') }}" method="POST">
            {{ csrf_field() }}
            <div class="input-container">

                <label for="email">Email</label>
                <input id="email" name="email" type="text">
                @error("email")
                <span class="input-error" >{{ $errors->first("email") }}</span>
                @enderror
            </div>

            <input type="submit" value="Send Reset Link">
        </form>
    </div>
</body>

</html>
