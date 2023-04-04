<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="style.css" />
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <!-- Font Awseome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
</head>

<body>

  <?php

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once "db_connect.php";

    session_start();

    // get params
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    $sql = "SELECT * FROM users WHERE email = '" . $email . "' AND password = '" . $password . "' AND role = '" . $role . "';";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION["id"] = $row["id"];
      $_SESSION["name"] = $row["name"];
      $_SESSION["email"] = $row["email"];
      // $_SESSION["password"] = $row["password"];
      $_SESSION["role"] = $row["role"];
      $_SESSION["account_img_path"] = $row["account_image"];

      // setup the account image 

      $original_img = $_SESSION["account_img_path"];
      $new_img_path = "./imgs/account.jpg";

      if (copy($original_img, $new_img_path)) {
        echo "Image Copied";
      } else {
        echo "Erreur While Copying File";
      }

      header("Location: welcome_user.php");
    } else {
      echo "<br>User not found";
    }
  }

  ?>
  <header>
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
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="btn btn-outline-primary me-2" href="#">Sign in</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-primary" href="join.php">Join</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <div class="container" style="margin-top: 9em">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form method="POST" action="" class="p-4 p-md-5 border rounded-3 bg-light">
          <div class="form-floating mb-3">
            <select class="form-select" name="role" id="roleSelect">
              <option value="" selected>Select a role</option>
              <option value="admin">Admin</option>
              <option value="teacher">Teacher</option>
              <option value="student">Student</option>
            </select>
            <label for="roleSelect">Role</label>
          </div>
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required />
            <label for="email">Email address</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required />
            <label for="password">Password</label>
          </div>

          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me" /> Remember me
            </label>
          </div>

          <button class="w-100 btn btn-lg btn-primary" type="submit">
            Sign in
          </button>
          <p class="mt-3 mb-3 text-muted">Or</p>
          <a class="w-100 btn btn-lg btn-secondary" href="join.html">
            Create an account
          </a>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>