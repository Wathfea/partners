<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Partner manager alpha 0.1">
    <meta name="author" content="Perlusz Dávid">

    <title>{{ config('app.name', 'Partners Manager') }}</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

<body>

@include('app.layouts.navbar')

<main role="main" class="container mt-5">
    @yield('content')
</main><!-- /.container -->

@include('app.layouts.footer')
</body>
</html>