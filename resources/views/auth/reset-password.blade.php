<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/reset_password.css') }}">
    <title>Reset Your Password</title>
</head>

<body>

    <div class="container">
        <h2>Reset Your Password</h2>
        @if (session('status'))
            <p class="status">{{ session('status') }}</p>
        @endif


        <form action="{{ route('password.update') }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="input-container">

                <label for="email">Email</label>
                <input id="email" name="email" type="text" value="{{ old('email', $request->email) }}">
                @error('email')
                    <span class="input-error">{{ $errors->first('email') }}</span>
                @enderror
            </div>
            <div class="input-container">

                <label for="password">Password</label>
                <input id="password" name="password" type="text">
                @error('password')
                    <span class="input-error">{{ $errors->first('password') }}</span>
                @enderror
            </div>
            <div class="input-container">

                <label for="password-confirm">Retype Password</label>
                <input id="password-confirm" name="password-confirm" type="text">
                @error('password')
                    <span class="input-error">{{ $errors->first('password-confirm') }}</span>
                @enderror
            </div>

            <input type="submit" value="Change Your Password">
        </form>
    </div>
</body>

</html>
