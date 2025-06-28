<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Binary App')</title>


    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery (optional, required only if you plan to use it) -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    @stack('styles') <!-- Optional for page-specific CSS -->
</head>
<body>
    <!-- Navbar (optional) -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Binary Web Solutions</a>
        </div>
    </nav>





    
    
    <div class="container">
        @yield('content')
    </div>

    <!-- Bootstrap 5 JS Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts') <!-- Optional for page-specific JS -->
</body>
</html>
