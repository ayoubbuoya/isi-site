<?php

session_start();

require_once "db_connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Class</title>
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
                <?php
                require_once("functions.php");
                headerLinks();
                ?>
                <div class="navbar-nav ms-auto mb-2 mb-lg-0 me-3" id="account">
                    <div class="dropdown-account">
                        <button class="drop-btn" type="button">
                            <img src="<?php echo $_SESSION["account-img"] ?>" class="account-img" alt="">
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
        <form class="join-class-container" action="create_class_post.php" method="post">
            <h4>Class Name</h4>
            <p style="line-height: 1.5rem">Enter your class name and a 5-7 letters code will be generated.give it to your students so they can access your class.</p>
            <div class="form-floating mt-4 mb-4">
                <input type="text" class="form-control" name="class-name" id="class-name" placeholder="Class code" value="">
                <label for="class-name">Class name</label>
            </div>
            <div class="form-floating mb-4">
                <textarea class="form-control" name="class-description" id="class-description" placeholder="Class description"></textarea>
                <label for="class-description">Class description</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">
                Create Class
            </button>
        </form>
    </main>
</body>

</html>