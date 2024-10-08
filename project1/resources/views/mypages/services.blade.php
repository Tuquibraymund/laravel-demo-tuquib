<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 50px;
        }
        .container {
            max-width: 600px;
        }
        .btn-custom {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">My Website</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('gallery')}}">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('index')}}">Index/Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('services')}}">Services</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1 class="text-center my-4">THIS IS THE SERVICES</h1>
        <div class="text-center">
            <a href="{{route('gallery')}}" class="btn btn-primary btn-custom">Gallery</a>
            <a href="{{route('index')}}" class="btn btn-secondary btn-custom">Index/Home</a>
            <a href="{{route('services')}}" class="btn btn-success btn-custom">Services</a>
            <a href="{{route('calculator')}}" class="btn btn-success btn-custom">Calculator</a>
        </div>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>













<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
</head>
<body>
    <h1>THIS IS SERVICES</h1>
    <br>
    <a href="{{route('gallery')}}">
        <button>Gallery</button>
    </a>
    <br>
    <a href="{{route('index')}}">
        <button>Index/Home</button>
    </a>
    <br>
    <a href="{{route('services')}}">
        <button>Services</button>
    </a>
</body>
</html> -->