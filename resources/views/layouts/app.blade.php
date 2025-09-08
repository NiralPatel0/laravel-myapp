<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') || My app</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container text-center">
            <a class="navbar-brand mx-auto fs-2 fw-bolder" href="/">My App</a>

        </div>
    </nav>

    @yield('content')


    <footer>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container text-center">
                <a class="navbar-brand mx-auto fs-6" href="#">Copyright 2025 My App.</a>
            </div>
        </nav>
    </footer>
</body>

</html>