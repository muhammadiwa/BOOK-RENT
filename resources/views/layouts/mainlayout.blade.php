<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rental Buku | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<style>
    .main {
        height: 100vh;
    }

    .sidebar {
        background: rgb(90, 89, 89);
        color: #fff;
    }

    .sidebar a {
        color: #fff;
        text-decoration: none;
        display: block;
        padding: 20px 10px;
    }

    .sidebar a:hover {
        color: black;
    }

</style>
<body>
    <div class="main d-flex flex-column justify-content-between">
        <nav class="navbar navbar-dark navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Rental Buku</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        <div class="body-content h-100">
            <div class="row g-0 h-100">
                <div class="sidebar col-lg-2 collapse d-lg-block" id="navbarNav">
                        @if (Auth::user()->role_id == 1)
                            <a href="dashboard">Dashboard</a>
                            <a href="books">Books</a>
                            <a href="">Categories</a>
                            <a href="">Users</a>
                            <a href="">Rent Log</a>
                            <a href="logout">Log Out</a>
                        @else
                            <a href="profile">Profile</a>
                            <a href="logout">Log Out</a>
                        @endif 
                </div>
                <div class="content p-5 col-lg-10">
                    @yield('content')
                </div>
            </div>

        </div>
    </div>

    <div>
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>