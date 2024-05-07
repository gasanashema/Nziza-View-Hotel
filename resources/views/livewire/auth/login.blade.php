<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->


<!-- Mirrored from themesflat.co/html/remos/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 Apr 2024 05:12:17 GMT -->

<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Nziza View Hotel</title>

    <meta name="author" content="themesflat.com">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/animation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">



    <!-- Font -->
    <link rel="stylesheet" href="{{asset('font/fonts.css')}}">

    <!-- Icon -->
    <link rel="stylesheet" href="{{asset('icon/style.css')}}">

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('images/favicon.png')}}">
    @livewireStyles
</head>

<body class="body">

    <!-- #wrapper -->
    <div id="wrapper">
        <!-- #page -->
        <div id="page" class="">
            <div class="wrap-login-page">
                <div class="flex-grow flex flex-column justify-center gap30">
                    <a href="index.html" id="site-logo-inner">
                        <img src="images/logo/logo.png" alt="">
                    </a>
                    <div class="login-box">
                        <div>
                            <h3>Login to account</h3>
                            <div class="body-text">Enter your email & password to login</div>
                        </div>
                      
                        <!-- Error Message -->
                        @if (session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif



                        <form class="form-login flex flex-column gap24" wire:submit.prevent="login">

                            <fieldset class="email">
                                <div class="body-title mb-10">Email address <span class="tf-color-1">*</span></div>
                                <input wire:model="email" class="flex-grow @error('email') border-danger @enderror" type="email" placeholder="Enter your email address" name="email" tabindex="0" aria-required="true" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </fieldset>
                            <fieldset class="password">
                                <div class="body-title mb-10">Password <span class="tf-color-1">*</span></div>
                                <input wire:model="password" class="password-input @error('password') border-danger @enderror" type="password" placeholder="Enter your password" name="password" tabindex="0" value="" aria-required="true" autocomplete="current-password">
                                <span class="show-pass">
                                    <i class="icon-eye view"></i>
                                    <i class="icon-eye-off hide"></i>
                                </span>
                            </fieldset>
                            <div class="flex justify-between items-center">

                            </div>
                            <button type="submit" class="tf-button w-full">Login</button>
                        </form>


                    </div>
                </div>
                <div class="text-tiny">Copyright © 2024 Nziza View Hotel, All rights reserved.</div>
            </div>
        </div>
        <!-- /#page -->

    </div>
    <!-- /#wrapper -->

    <!-- Javascript -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
    @livewireScripts

</body>


<!-- Mirrored from themesflat.co/html/remos/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 Apr 2024 05:12:17 GMT -->

</html>