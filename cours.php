<?php
session_start();

if (isset($_SESSION['id'])) {
  $id = $_SESSION['id'];
  $name = $_SESSION['name'];
  $email = $_SESSION['email'];
  $role = $_SESSION['role'];
  $account_img = $_SESSION["account-img"];
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
  <!-- Boxicons -->
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
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
        <?php
        require_once("functions.php");
        headerLinks();
        ?>
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
              <img src="<?php echo $account_img ?>" class="account-img" alt="">
            </button>
            <div class="dropdown-account-content">

              <?php
              if ($_SESSION["role"] == "student") {
              ?>
                <a href="join_class.php">Join class</a><br>
              <?php
              } elseif ($_SESSION["role"] == "teacher") {
              ?>
                <a href="create_class.php">Create class</a><br>
              <?php } ?>
              <a href="#" id="upload-image-btn">Change Image</a><br>
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
        <!-- Upload Image Model -->
        <form class="image-upload-container" action="change_picture.php" method="post" enctype="multipart/form-data" style="display: none;">
          <input type="file" id="file" name="image" accept="image/*" hidden>
          <div class="img-area" data-img="">
            <i class='bx bxs-cloud-upload icon'></i>
            <h3>Upload Image</h3>
            <p>Image size must be less than <span>2MB</span></p>
          </div>
          <button type="button" class="select-image">Select Image</button>
          <input type="submit" id="submit_btn" class="btn btn-secondary w-100 m-2 p-3 rounded" name="submit_btn" value="Change Picture">
        </form>
        <?php

        require_once "db_connect.php";

        $sql = "SELECT classes.* FROM classes , enrollments  WHERE classes.id = enrollments.class_id AND enrollments.user_id = " . $id;

        if ($_SESSION["role"] === "admin") {
          $sql = "SELECT * FROM classes";
        }

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
                  <?php echo nl2br($row["name"]) ?>
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
  <script>
    var uploadImageA = document.getElementById("upload-image-btn");
    const selectImage = document.querySelector('.select-image');
    const inputFile = document.querySelector('#file');
    const imgArea = document.querySelector('.img-area');

    uploadImageA.addEventListener("click", function() {
      document.querySelector(".image-upload-container").style.display = "block";
    })

    selectImage.addEventListener('click', function() {
      inputFile.click();
    })

    inputFile.addEventListener('change', function() {
      const image = this.files[0]
      if (image.size < 2000000) {
        const reader = new FileReader();
        reader.onload = () => {
          const allImg = imgArea.querySelectorAll('img');
          allImg.forEach(item => item.remove());
          const imgUrl = reader.result;
          const img = document.createElement('img');
          img.src = imgUrl;
          imgArea.appendChild(img);
          imgArea.classList.add('active');
          imgArea.dataset.img = image.name;
        }
        reader.readAsDataURL(image);
      } else {
        alert("Image size more than 2MB");
      }
    })
  </script>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>