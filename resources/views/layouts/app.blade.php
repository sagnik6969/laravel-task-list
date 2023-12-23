<!-- Blade inheritance -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <title>Task list app</title>
    <style>
        .container {
            max-width: 700px;
            background-color: #ffffff;
            border: 1px solid #ced4da;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }

        .header {
            border-bottom: 1px solid #dee2e6;
            padding-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <div class="header text-primary mb-4">
            <h1 class="text-center">
                @yield('title')
                <!-- place holders where values will be put -->
            </h1>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert">
                    &times;
                </button>
            </div>
        @endif
        <div>
            @yield('content')
            <!-- place holders where values will be put -->
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
        </script>
    </div>
</body>

</html>
