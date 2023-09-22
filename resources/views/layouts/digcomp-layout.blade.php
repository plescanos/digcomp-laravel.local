<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/css/own-main-style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/own-main-style.css') }}">
    <link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">
    <title>{{ isset($title) ? $title : 'Dashboard Digcomp 2023 || Pablo Lescano'}}</title>
</head>
<body class="body-dashboard">

    <header class="header">
        @include('parts/header')
    </header>

    @include('parts/content')

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>