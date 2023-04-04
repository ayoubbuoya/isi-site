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

// session_destroy(); 

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ISI Courses</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <!-- Font Awseome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

  <!-- Custom CSS -->
  <link rel="stylesheet" href="style-cours.css" />

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
        // Redirect to a new page
        window.location.href = "login.php";
      }
    }
  </script>

  <!-- Header Section -->
  <header id="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
      <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="index.php">
          <img src="imgs/islain.png" alt="sjhns" class="isi-logo" />
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

                <?php
                if ($_SESSION["role"] == "student") {
                ?>
                  <a href="join_class.php">Join class</a>
                <?php
                } elseif ($_SESSION["role"] == "teacher") {
                ?>
                  <a href="create_class.php">Create class</a>
                <?php } ?>
                <a href="logout.php">Log out</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <?php
  if ($logged == true) {
  ?>
    <main class="container h-100">
      <div class="row align-middle">
        <?php

        require_once "db_connect.php";

        $sql = "SELECT classes.* FROM classes , enrollments  WHERE classes.id = enrollments.class_id AND enrollments.user_id = " . $id;

        if ($_SESSION["role"] === "admin") {
          $sql = "SELECT * FROM classes";
        }

        echo "<script>console.log('$sql');</script>";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
        ?>
            <div class="col-md-6 col-lg-4 column">
              <?php
              $color = $row["color"];
              echo "<div class='card " . $color . "'>"
              ?>
              <div class="txt">
                <h1>
                  <?php echo $row["name"] ?>
                </h1>
                <p><?php echo $row["description"]; ?></p>
              </div>
              <?php
              $class_id =  $row["id"];
              echo "<a href='class.php?id=" . $class_id . "'> go to class</a> "
              ?>
              <!-- <a href="class.php?class_id=1">go to class</a> -->
              <div class="ico-card">
                <i class="fa fa-rebel"></i>
              </div>
            </div>
      </div>
  <?php
          }
        }
  ?>


  </div>
    </main>
  <?php
  }
  ?>

  </script>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>