<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Event Ticket App')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Event Ticket App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a href="{{ route('events.index') }}" class="nav-link">Evenimente</a></li>
                <li class="nav-item"><a href="{{ route('cart') }}" class="nav-link">Cos</a></li>
            </ul>
            @if(Auth::check())
                <form action="{{ route('logout') }}" method="post" class="form-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-light">Logout</button>
                </form>
            @endif
            <div class="btn ml-2">
                <a href="{{ route('admin.index') }}" class="btn btn-outline-light">Panou de control</a>
            </div>
            <div class="btn ml-2">
                <a href="{{ route('user.sponsors.index') }}" class="btn btn-outline-light">Sponsori</a>
            </div>
            <div class="btn ml-2">
                <a href="{{ route('user.parteners.index') }}" class="btn btn-outline-light">Parteneri</a>
            </div>
        </div>
    </div>
</nav>

<main class="container mt-4">
    @yield('content')
</main>

<footer class="mt-4 text-center">
    <p>&copy; {{ date('Y') }} Event Ticket App. Toate drepturile rezervate.</p>
</footer>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
