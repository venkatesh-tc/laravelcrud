<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Include CSS, JS files here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
        </script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Example CSS file -->
</head>
<body>
    <!-- Header Section -->

    <!-- Main Content Section -->
    <div class="container">
        @yield('contact')  <!-- Content of each page will be injected here -->
    </div>

    <!-- Footer Section -->
    <footer>
        <p>&copy; {{ date('Y') }} My Laravel App</p>
    </footer>

    <!-- Include JavaScript files -->
    <script src="{{ asset('js/app.js') }}"></script> <!-- Example JS file -->
</body>
</html>
