<?php
session_start();

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $role = $_SESSION['role'];
    $logged =  true;
} else {
    $logged = false;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <!-- Font Awseome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

    <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" /> -->
    <!-- csss -->
    <link rel="stylesheet" href="style.css" />
</head>

<body onload="load();">
    <script>
        function load() {
            // Load the PHP script that outputs the session variables as a JSON object
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'get_session_infos.php');
            xhr.onload = function() {
                // Parse the JSON response
                var sessionData = JSON.parse(xhr.responseText);
                console.log(sessionData);
            };
            xhr.send();

            // check if logged n 
            var header = document.getElementById("header");
            var logged = <?php echo $logged ? 'true' : 'false'; ?>;
            var account = document.getElementById("account");
            var noAccount = document.getElementById("no-account");
            if (logged) {
                header.classList.add('logged');
                noAccount.classList.toggle("hidden");
            } else {
                account.classList.toggle("hidden");
            }
        }
    </script>


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
                            <a class="btn btn-outline-primary me-2" href="login.php">Sign in</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary" href="join.php">Join</a>
                        </li>
                    </ul>
                    <div class="navbar-nav ms-auto mb-2 mb-lg-0 me-3" id="account">
                        <div class="dropdown-account">
                            <button class="drop-btn" type="button">
                                <img src="./imgs/account.jpg" class="account-img" alt="">
                            </button>
                            <div class="dropdown-account-content">
                                <a href="logout.php">Log out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <!-- End Header Section -->
    <main style="margin-top: 8rem">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="add_user.php" method="post" class="p-4 p-md-5 border rounded-3 bg-light" onsubmit="return validateForm()">
                    <div id="errorDiv" class="text-danger"></div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required />
                        <label for="name">Name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required />
                        <label for="email">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required />
                        <label for="password">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="confirm-password" placeholder="Confirm Password" required />
                        <label for="confirm-password">Confirm Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="roleSelect" name="role">
                            <option value="" selected>Select a role</option>
                            <option value="admin">Admin</option>
                            <option value="teacher">Teacher</option>
                            <option value="student">Student</option>
                        </select>
                        <label for="roleSelect">Role</label>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary" type="submit">
                        Sign up
                    </button>
                    <p class="mt-3 mb-3 text-muted">Or</p>
                    <a class="w-100 btn btn-lg btn-secondary" href="login.html">
                        Already have an account ?
                    </a>
                </form>
            </div>
        </div>
    </main>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>