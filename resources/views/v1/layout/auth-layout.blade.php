<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{str_replace('_', ' ', env("APP_NAME"))}}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    {{--todo head links--}}
    <x-link.head-link></x-link.head-link>
    {{--todo section style--}}
    @yield('styles')
</head>

<body>
@include('sweetalert::alert')
<main>
    <div class="container">
        @yield('content')
    </div>
</main>
{{--todo footer--}}
{{--<x-bar.bottombar></x-bar.bottombar>--}}


{{--todo script links--}}
<x-link.script-link></x-link.script-link>
{{--todo section scripts--}}
@yield('scripts')
</body>

</html>
