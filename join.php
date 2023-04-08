<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Create new account</title>
  <link rel="stylesheet" href="style.css" />
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <!-- Font Awseome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
      <div class="container-fluid">
        <?php
        require_once("functions.php");
        headerLinks();
        ?>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="btn btn-outline-primary me-2" href="login.php">Sign in</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-primary" href="#">Join</a>
          </li>
        </ul>
      </div>
      </div>
    </nav>
  </header>

  <div class="container text-center" style="margin-top: 100px">
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
          <a class="w-100 btn btn-lg btn-secondary" href="login.php">
            Already have an account ?
          </a>
        </form>
      </div>
    </div>
  </div>

  <script>
    function validateForm() {
      let email = document.getElementById("email").value;
      let password = document.getElementById("password").value;
      let confirmPassword = document.getElementById("confirm-password").value;
      let errorDiv = document.getElementById("errorDiv");
      let errMsg = "";

      if (email.split("@")[1] !== "isikef.u-jendouba.tn") {
        errMsg += "<p>email must contain @isikef.u-jendouba.tn</p>";
      }

      if (password.length !== 8) {
        errMsg += "<p>Password must be your cin</p>";
      }

      if (confirmPassword !== password) {
        errMsg += "<p>Passwords do not match</p>";
      }

      if (errMsg !== "") {
        errorDiv.innerHTML = errMsg;
        return false;
      }

      return true;
    }
  </script>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>