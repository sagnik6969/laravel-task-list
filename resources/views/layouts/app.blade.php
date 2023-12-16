
<!-- Blade inheritance -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task list app</title>
</head>

<body>
    <h1>
        @yield('title')
        <!-- place holders where values will be put -->
    </h1>
    <div>
        @yield('content')
        <!-- place holders where values will be put -->
    </div>
</body>

</html>