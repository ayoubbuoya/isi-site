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

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Events</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <!-- Font Awseome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

  <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" /> -->
  <!-- csss -->
  <link rel="stylesheet" href="style.css" />
  <!-- css for events -->
  <style>

  </style>
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
              <img src="<?php echo $account_img ?>" class="account-img" alt="" />
            </button>
            <div class="dropdown-account-content">
              <?php
              if ($_SESSION["role"] == "admin") {
              ?>
                <a href="create_event.php">Create event</a><br>
                <a href="#deleteEventModal" data-bs-toggle="modal" data-bs-target="#deleteEventModal<?php echo $event_id ?>">Delete Event</a>
                <br>
              <?php } ?>
              <a href="logout.php">Log out</a>
            </div>
          </div>
        </div>
      </div>
      </div>
    </nav>
  </header>

  <main>
    <!-- Start Event Section -->
    <section class="news" id="news">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-7 text-center">
            <div class="section-title">
              <h2>Events</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <?php

          require_once "db_connect.php";

          $sql = "SELECT *, DATE_FORMAT(date, '%d-%m') AS date_month FROM events";
          $res = $conn->query($sql);

          if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
              $event_id = $row["id"];
              $date_month = $row['date_month'];
              $event_name = $row["name"];
              $event_description = $row["description"];
              $event_image = $row["image"];
              $date = explode("-", $date_month)[0];
              $month = explode("-", $date_month)[1];
              $month_name = date("F", mktime(0, 0, 0, $month, 1));
          ?>
              <div class="col-lg-4">
                <div class="blog-grid">
                  <div class="blog-img">
                    <div class="date">
                      <span style="text-transform: uppercase;"><?php echo $date . " " . $month_name ?></span>
                    </div>
                    <a href="#">
                      <img style="height: 12rem; width: 20rem;" src="<?php echo $event_image ?>" />
                    </a>
                  </div>
                  <div class="blog-info" style="min-height: 10rem">
                    <h5>
                      <a href="#" style="text-transform: capitalize;">
                        <?php echo $event_name ?>
                      </a>
                    </h5>
                    <p>
                      <?php echo $event_description ?>
                    </p>
                    <!-- <div class="btn-bar">
                  <a href="new1.html" class="px-btn-arrow">
                    <span>Read More</span>
                    <i class="arrow"></i>
                  </a>
                </div> -->
                  </div>
                </div>
              </div>
          <?php
            }
          }
          ?>
        </div>
      </div>
    </section>
    <!-- Pop Up Delete Event -->
    <div class="modal fade" id="deleteEventModal" tabindex="-1" aria-labelledby="deleteEventModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteEventModalLabel">Delete Event</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="deleteEventForm">
              <div class="mb-3">
                <label for="eventSelect" class="form-label">Select Event to Delete:</label>
                <select class="form-select" id="eventSelect" name="event_id">
                  <?php
                  $sql = "SELECT id, name FROM events";
                  $res = $conn->query($sql);
                  if ($res->num_rows > 0) {
                    while ($row = $res->fetch_assoc()) {
                      $event_id = $row["id"];
                      $event_name = $row["name"];
                      echo "<option value='$event_id'>$event_name</option>";
                    }
                  }
                  ?>
                </select>
              </div>
              <button type="submit" class="btn btn-danger">Delete Event</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script>
      // Handle form submission
      document.getElementById("deleteEventForm").addEventListener("submit", function(event) {
        event.preventDefault();
        var event_id = document.getElementById("eventSelect").value;
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "delete_event.php");
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onload = function() {
          if (xhr.status === 200) {
            // Reload the page to update the event list
            location.reload();
          } else {
            alert("Error deleting event");
          }
        };
        xhr.send("event_id=" + encodeURIComponent(event_id));
      });
    </script>

  </main>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>