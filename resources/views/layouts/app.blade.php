<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laravel Quickstart - Basic</title>

    <!-- CSS And JavaScript -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div>
        <nav>
            <!-- Navbar Contents -->
        </nav>
    </div>
    <div class="container mx-auto prose lg:prose-xl">
        @yield('content')
    </div>
</body>

</html>