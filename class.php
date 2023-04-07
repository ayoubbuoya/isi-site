<?php
session_start();
if (isset($_SESSION['id'])) {
  $id = $_SESSION['id'];
  $name = $_SESSION['name'];
  $email = $_SESSION['email'];
  $role = $_SESSION['role'];
  // get the infos of class
  require_once  "db_connect.php";

  $class_id = $_GET['id'];
  $result = $conn->query("SELECT name, code, image FROM classes WHERE id = " . $class_id);
  $row = $result->fetch_assoc();
  $class_code = $row["code"];
  $class_title = str_replace("<br>", " ", $row["name"]);
  // copy the img to the local
  $class_img = $row["image"];
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo $class_title ?></title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <!-- Font Awseome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

  <!-- Custom CSS -->
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="style-cours.css" />
  <style>
    .class-container .img-container {
      background-image: url("<?php echo $class_img ?>");
      background-size: cover;
      background-position: center;
      height: 0;
      padding-bottom: 30%;
    }
  </style>
</head>

<body>
  <!-- Header Section -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
      <h3 class="w-50 ms-2" style="color: #de2524; opacity: 0.8">
        <?php echo $class_title ?>
      </h3>
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 navs">
            <li class="nav-item">
              <a class="nav-link me-4 ms-4" href="#stream">Stream</a>
            </li>
            <li class="nav-item">
              <a class="nav-link me-4 ms-4" href="#people">People</a>
            </li>
          </ul>
          <div class="navbar-nav ms-auto mb-2 mb-lg-0 me-3" id="account">
            <div class="dropdown-account">
              <button class="drop-btn" type="button">
                <img src="./imgs/account.png" class="account-img" alt="" />
              </button>
              <div class="dropdown-account-content">
                <a href="index.php">Home</a><br>
                <a href="logout.php">Log out</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <!-- Main  -->
  <main>
    <section class="container class-container" id="stream">
      <div class="row">
        <div class="col-lg-11">
          <div class="img-container ms-5 w-100"></div>
        </div>
      </div>
      <div class="content-container ms-5 w-100">
        <div class="row post-row-1">
          <div class="col-lg-1"></div>

          <?php if ($role === "teacher") { ?>
            <div class="col-lg-2 class-code-show">
              <h5>Class Code : </h5>
              <p style="color: #222; text-align: center; font-size: 1.5rem"><?php echo $class_code;  ?></p>
            </div>
          <?php } else { ?>
            <div class="col-lg-2"></div>
          <?php } ?>

          <div class="col-lg-6 post-container">
            <img src="imgs/account.png" class="account-img" alt="">
            <button type="button" id="create-post-btn" class="annouce-btn">annouce something to your class</button>
          </div>
          <div class="col-lg-3"></div>
        </div>
        <div class="row post-row-2 hidden">
          <form class="post-input-container" action=<?php echo "add_post.php?class_id=" . $class_id ?> method="POST" enctype="multipart/form-data">
            <textarea name="post-content" placeholder="announce something to your class" class="post-input"></textarea>
            <label for="file-upload" class="custom-file-upload">
              <i class="fas fa-cloud-upload-alt"><span>Upload File</span></i>
            </label>
            <input id="file-upload" name="file" type="file" />
            <input type="submit" class="btn-submit" value="Post" disabled>
            <input type="button" class="btn-cancel" value="Cancel">
          </form>
        </div>
        <div class="row">
          <div class="col-lg-11">
            <?php

            require_once "db_connect.php";

            $sql = "SELECT posts.* FROM posts WHERE posts.class_id = " . $class_id . " ORDER BY posts.last_updated DESC";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                $post_id = $row["id"];
                $post_file = $row["file"];

            ?>
                <article class="post">
                  <div class="post-info">
                    <?php
                    $res = $conn->query("SELECT id, name, account_image FROM users WHERE id = " . $row["user_id"]);
                    $user_row = $res->fetch_assoc();
                    // copy the poster image to loclahost
                    $poster_img = $user_row["account_image"];
                    echo "<img src='" . $poster_img . "'>";
                    echo "<div>";
                    echo "<span>" . $user_row["name"] . "</span>";
                    echo "<br>" . "<span>" . $row["last_updated"] . "</span>";
                    echo "</div>";
                    ?>
                  </div>
                  <hr>
                  <div class="post-desciption">
                    <p>
                      <?php
                      $text = nl2br($row["content"]);

                      $text = preg_replace_callback(
                        "/https?:\/\/[^\s]+/",
                        function ($match) {
                          return "<a href='" . $match[0] . "'>" . $match[0] . "</a>";
                        },
                        $text
                      );

                      echo $text;
                      ?>
                      <a href="<?php echo $post_file ?>"><?php echo "<br>" . pathinfo($post_file, PATHINFO_FILENAME); ?> </a>
                    </p>
                  </div>
                  <hr>
                  <form class="post-comment-container" action=<?php echo "add_comment.php?post_id=" . $post_id ?> method="POST">
                    <img src="imgs/account.png" class="account-img" alt="">
                    <input type="text" name="comment" id="comment" class="post-comment-input">
                    <input type="submit" value="Post">
                  </form>
                  <!-- check if they are some comments for that post -->
                  <?php


                  $sql = "SELECT * FROM comments WHERE comments.post_id = " . $post_id;

                  $comments_res = $conn->query($sql);

                  if ($comments_res->num_rows > 0) {
                  ?>
                    <hr>
                    <div class="post-comments-container">
                      <?php
                      while ($comments_row = $comments_res->fetch_assoc()) {
                      ?>
                        <div class="comment-container">
                          <!-- PHP WORK here  -->
                          <?php
                          $user_comment_res =  $conn->query("SELECT name, account_image FROM users WHERE users.id = " . $comments_row["user_id"]);
                          if ($user_comment_res->num_rows > 0) {
                            $user_comment_row = $user_comment_res->fetch_assoc();
                            $user_comment_img = $user_comment_row["account_image"];
                            $user_comment_name = $user_comment_row["name"];
                          }
                          ?>
                          <!-- comments shows  here  -->
                          <img src=<?php echo "'$user_comment_img'" ?> alt="">
                          <div>
                            <span class="comment-user-name"><?php echo $user_comment_name ?></span>
                            <p class="comment-content">
                              <?php
                              $text =  $comments_row["content"];

                              $text = preg_replace_callback(
                                "/https?:\/\/[^\s]+/",
                                function ($match) {
                                  return "<a href='" . $match[0] . "' style='text-decoration: underline; font-weight: 400; '>" . $match[0] . "</a>";
                                },
                                $text
                              );

                              echo $text;
                              ?>
                            </p>
                          </div>
                        </div>
                    <?php
                      }
                      echo "</div>";
                    }
                    ?>

                </article>
            <?php
              }
            }
            ?>
          </div>
        </div>
      </div>
    </section>
    <section id="people" class="conntainer class-container" style="margin-top: 7rem; display: none;">
      <?php

      require_once "db_connect.php";

      $sql = "SELECT users.* FROM users INNER JOIN enrollments ON users.id = enrollments.user_id WHERE enrollments.class_id = " . $class_id;
      $people_res = $conn->query($sql);
      if ($people_res->num_rows > 0) {
        while ($row = $people_res->fetch_assoc()) {
      ?>
          <div class="row mb-5">
            <div class="col-md-3"></div>
            <div class="col-md-6 people">
              <div>
                <img src="<?php echo $row['account_image'] ?>" alt="" class="account-img">
                <span><?php echo $row["name"] ?></span>
              </div>
              <span><?php echo $row["email"] ?></span>

            </div>
            <div class="col-md-3"></div>
          </div>
      <?php
        }
      }
      ?>
    </section>
  </main>
  <script>
    const stream = document.getElementById("stream");
    const people = document.getElementById("people");
    // Function to show/hide the elements based on the URL fragment identifier
    function showHideElements() {
      if (window.location.hash === "#stream") {
        stream.style.display = "block";
        people.style.display = "none";
      } else if (window.location.hash === "#people") {
        stream.style.display = "none";
        people.style.display = "block";
      }
    }
    // Call the function initially to show/hide the elements based on the current URL fragment identifier
    showHideElements();
    // Add an event listener to the window object to show/hide the elements whenever the URL fragment identifier changes
    window.addEventListener("hashchange", showHideElements);
  </script>
  <script>
    var createPostBtn = document.getElementById("create-post-btn");
    var postRow1 = document.querySelector(".post-row-1");
    var postRow2 = document.querySelector(".post-row-2");
    createPostBtn.addEventListener("click", () => {
      postRow1.classList.toggle("hidden");
      postRow2.classList.toggle("hidden");
      postInput.focus();

    })

    var postInput = document.querySelector(".post-input");
    var submitBtn = document.querySelector(".btn-submit");
    var cancelBtn = document.querySelector(".btn-cancel");
    var fileUpload = document.getElementById("file-upload");
    postInput.addEventListener("input", () => {
      if (postInput.value.length > 2) {
        submitBtn.disabled = false;
      } else {
        submitBtn.disabled = true;
      }
    });



    fileUpload.addEventListener("change", () => {
      if (fileUpload.files.length > 0) {
        submitBtn.disabled = false;
      } else {
        submitBtn.disabled = true;
      }
    })

    cancelBtn.addEventListener("click", () => {
      let promtResult = confirm("Changes you made may not be saved.")
      if (promtResult) {
        postRow1.classList.toggle("hidden");
        postRow2.classList.toggle("hidden");
      }
    })
  </script>
</body>

</html>