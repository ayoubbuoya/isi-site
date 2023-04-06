<?php

session_start();

if (session_status() === PHP_SESSION_ACTIVE) {
    $id = $_SESSION['id'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $role = $_SESSION['role'];
    $logged =  true;


?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Join Class</title>
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
        <!-- Font Awseome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
        <!-- csss -->
        <link rel="stylesheet" href="style.css" />
    </head>

    <body onload="load()">
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
                                <a class="nav-link me-3 ms-2" href="#">Events</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-3 ms-2" href="#">Clubs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-3 ms-2" href="index.php#contact">Contact</a>
                            </li>
                        </ul>

                        <div class="navbar-nav ms-auto mb-2 mb-lg-0 me-3" id="account">
                            <div class="dropdown-account">
                                <button class="drop-btn" type="button">
                                    <img src="./imgs/account.png" class="account-img" alt="">
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
        <!-- main section -->
        <main class="container">
            <form class="join-class-container" action="join_class_post.php" method="POST">
                <h4>Class Code</h4>
                <p>Ask your teacher for the class code, then enter it here.</p>
                <div class="form-floating mt-4 mb-4">
                    <input type="text" class="form-control" name="class-code" id="class-code" placeholder="Class code" value="">
                    <label for="class-code">Class code</label>
                </div>
                <h5>To sign in with a class code </h5>
                <ul class="p-3 lh-base">
                    <li class="ms-2 mb-2">Use an authorised account</li>
                    <li class="ms-2">Use a class code with 5-7 letters or numbers, and no spaces or symbols</li>
                </ul>
                <button class="w-100 btn btn-lg btn-primary" type="submit">
                    Join
                </button>
            </form>
        </main>
        <script>
            window.onload = function() {
                <?php
                if (isset($_GET["found"]) && $_GET["found"] === "false") {
                ?>
                    alert("Class code not found");
                <?php
                }
                ?>
            }; 
        </script>

        <script>
            var form = document.forms[0];
            console.log(form);
            var classCode = document.getElementById("class-code");
            console.log(classCode.value);
            form.addEventListener('submit', function(e) {

                if (classCode.value.length < 5 || classCode.value.length > 7) {
                    alert("Class code must be between 5 and 7 characters");
                    e.preventDefault();
                } else {
                    console.log("evrything is ok");
                }
            })
        </script>
        <!-- Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>

    </html>

<?php }
?>