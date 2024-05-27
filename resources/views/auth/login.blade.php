<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="{{asset('css/login.css')}}"> --}}
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <x-navbar />
    <div class="wrapper">
    <div class="container main">
        <div class="row">
            <div class="col-md-6 side-image" style="background-image: url('{{asset('assets/binus-login.png')}}')">

                <div class="text">
                    <p>Creating Joyful Moments, One Step at a Time.</i></p>
                </div>

            </div>

            <div class="col-md-6 right">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-box">

                   <header>Login</header>
                   <div class="input-field">
                        <input type="text" class="input" id="email" name="email" required="">
                        <label for="email">Email</label>
                        <span id="emailError" class="error"></span>
                    </div>
                   <div class="input-field">
                        <input type="password" class="input" id="pass" name="password" required="">
                        <label for="pass">Password</label>
                        <span id="passwordError" class="error"></span>
                    </div>
                    @error('email')
                        <span class="error">{{ $message }}</span>
                    @enderror
                   <div class="input-field">

                        <input type="submit" class="submit" value="Log in" onclick="validateForm(event)">
                   </div>
                   <div class="signin">
                    <span>Don't have an account? <a href="{{route('register')}}" >Register here</a></span>
                   </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<x-footer />
</body>
<script src="/js/login.js"></script>

</html>
