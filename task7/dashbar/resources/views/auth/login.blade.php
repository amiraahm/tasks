<!DOCTYPE html>
<html lang="en">

<head>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    {!! NoCaptcha::renderJs() !!} --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Auth</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>

<body>
    <form class="box" method="POST" action="{{ route('login') }}">
        @csrf
        <h1>{{ __('Login') }}</h1>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}" required autocomplete="email" autofocus>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
            required autocomplete="current-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        {{-- <div class="{{ $errors->has('g-recaptcha-response') ? 'has-error' : '' }}">

            {!! NoCaptcha::display(['data-theme' => 'dark']) !!}
        </div>
        @if ($errors->has('g-recaptcha-response'))
            <span class="help-block">
                <strong> recaptcha هذا الحقل مطلوب </strong>
            </span>
        @endif --}}


        <button type="submit" class="btn btn-primary">
            {{ __('Login') }}
        </button>
        @if (Route::has('password.request'))
            <a style="color:#fff;" class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
        <br>
        <br>
        @if (Route::has('register'))
            <span style="color:#fff;">
                Don't have account
                <a style="color: #2ecc71;" class="nav-link"
                    href="{{ route('register') }}">{{ __('Register') }}</a>
            </span>
        @endif
    </form>
</body>

</html>
