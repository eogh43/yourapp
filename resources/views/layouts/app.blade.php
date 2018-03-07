<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="msapplication-tap-highlight" content="no">

    <!-- SEO -->
    <meta name="description" content="{{ config('project.description') }}">

    <!-- Facebook Meta -->
    <meta property="og:title" content="{{ config('app.name') }}">
    <meta property="og:image" content="">
    <meta property="og:type" content="Website">
    <meta property="og:author" content="">

    <!-- Google Meta -->
    <meta itemprop="name" content="">
    <meta itemprop="description" content="{{ config('project.description') }}">
    <meta itemprop="image" content="">
    <meta itemprop="author" content=""/>

    <!-- Twitter Meta-->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="">
    <meta name="twitter:title" content="{{ config('app.name') }}">
    <meta name="twitter:description" content="{{ config('project.description') }}">
    <meta name="twitter:image" content="">
    <meta name="twitter:domain" content="{{ config('project.url') }}">

    <meta name="csrt-token" content="{{csrf_token()}}">
    <title>{{config('app.name','laravel')}}</title>
    <link href="{{elixir("css/app.css")}}" rel="stylesheet">
    @yield('style')
</head>
<body id="app-layout">
{{--@include('layouts.partial.navigation')--}}

<div class="container">
    @include('flash::message')
    @yield('content')
</div>
@include('layouts.partial.footer')

<script src="{{elixir("js/app.js")}}"></script>
@yield('script')
</body>
</html>