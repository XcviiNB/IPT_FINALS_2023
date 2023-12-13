<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Batausa Prelim</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Games</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                @if (auth()->check())
                    <ul class="navbar-nav me-auto">
                        @can('manage-games')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                                </li>
                        @endcan
                        @can('see-logs')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/logs') }}">Logs</a>
                            </li>
                        @endcan
                        @can('buy-games')
                            <li class="nav-item">
                                <a href="{{ url('/gamestore') }}" class="nav-link">Buy Games</a>
                            </li>
                        @endcan
                    </ul>

                    <form action="{{ url('/logout') }}" method="POST" class="d-inline-block ms-auto my-auto">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-outline-danger align-self-center">Logout ({{ auth()->user()->name }})</button>
                    </form>
                @endif
            </div>
        </div>
    </nav>

    @yield('content')
</body>
</html>

<style>
    body {
        background-image: url("https://images5.alphacoders.com/132/1326735.png");
        background-size: cover;
    }

    .navbar {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand {
        font-weight: bold;
        font-size: 1.5rem;
    }

    .navbar-nav .nav-link {
        font-weight: bold;
    }

    .navbar-dark .navbar-nav .nav-link:hover,
    .navbar-dark .navbar-nav .nav-link:focus {
        color: rgba(255,255,255,.75);
    }

    .nav-link.btn {
        padding: 0;
        border: none;
        background: none;
    }

    .btn-outline-danger {
        color: #fff;
        border-color: #ff6b6b;
        background-color: transparent;
    }

    .btn-outline-danger:hover {
        color: #fff;
        background-color: #ff6b6b;
        border-color: #ff6b6b;
    }

    form.d-inline-block {
        margin-bottom: 0;
    }

    /* .navbar .btn-outline-danger {
        padding: .5rem 1rem;
    } */
</style>
