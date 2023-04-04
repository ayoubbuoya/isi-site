<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location:login.php');
} else {
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin </title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <!-- Font Awseome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <!-- csss -->
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <!-- Header Section -->
    <header id="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center" href="index.php">
                    <img src="imgs/islain.png" alt="" class="isi-logo" />
                    <!-- <span class="fs-4">ISI Kef</span> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link me-3 ms-2" href="index.php#news">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-3 ms-2" href="index.php#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-3 ms-2" href="cours.php">Cours</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-3 ms-2" href="events.php">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-3 ms-2" href="index.php#formations">Nos Formations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-3 ms-2" href="index.php#contact">Contact</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0" id="no-account">

                        <li class="nav-item">
                            <a class="btn btn-primary" href="create_event.php">Log Out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End Header Section -->
    <main style="margin-top: 8rem">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">Admin</h1>
                </div>
            </div>
        </div>
    </main>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>