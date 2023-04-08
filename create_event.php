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

if ($_SERVER["REQUEST_METHOD"]  === "POST") {



    $event_name = $_POST["event-name"];
    $event_description = $_POST["event-description"];
    $event_image = pathinfo($_FILES['event-image']['name'], PATHINFO_FILENAME);

    // move the uploaded file to the specified directory
    $target_file = "db_imgs/" . strtolower($event_image) . ".png";

    if (move_uploaded_file($_FILES["event-image"]["tmp_name"], $target_file)) {
        echo "The file " . $event_image . " has been uploaded.";
        require_once "db_connect.php";
        $sql = "INSERT INTO events (name, description, image) VALUES ('$event_name', '$event_description', '$target_file')";
        $result = $conn->query($sql);
        if ($result > 0) {
            echo "Event inserted";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "There was an error uploading your file.";
    }
} else {
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
        <style>
            .filupp>input[type=file] {
                position: absolute;
                width: 1px;
                height: 1px;
                padding: 0;
                margin: -1px;
                overflow: hidden;
                clip: rect(0, 0, 0, 0);
                border: 0;
            }

            .filupp {
                position: relative;
                /* background: #242424; */
                display: block;
                padding: 1em;
                font-size: 1em;
                width: 100%;
                height: 3.5em;
                /* color: #fff; */
                cursor: pointer;
                box-shadow: 0px 8px 16px 0px #0000006c;
            }

            .filupp:before {
                content: "";
                position: absolute;
                top: 1.5em;
                right: 0.75em;
                width: 2em;
                height: 1.25em;
                border: 3px solid #dd4040;
                border-top: 0;
                text-align: center;
            }

            .filupp:after {
                content: "➜";
                -webkit-transform: rotate(-90deg);
                -moz-transform: rotate(-90deg);
                -ms-transform: rotate(-90deg);
                -o-transform: rotate(-90deg);
                transform: rotate(-90deg);
                position: absolute;
                top: 0.65em;
                right: 0.45em;
                font-size: 2em;
                color: #dd4040;
                line-height: 0;
            }

            .filupp-file-name {
                width: 75%;
                display: inline-block;
                max-width: 100%;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
                word-wrap: normal;
            }
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
        <!-- End Header Section -->
        <main style="margin-top: 8rem">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form class="p-4 p-md-5 border rounded-3 bg-light">
                        <div id="errorDiv" class="text-danger"></div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="event-name" name="event-name" placeholder="Event Name" required />
                            <label for="event-name">Event Name</label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="event-description" name="event-description" placeholder="Event Description" required></textarea>
                            <label for="event-description">Event Description</label>
                        </div>

                        <label for="custom-file-upload" class="filupp form-floating mt-3 mb-3">
                            <span class="filupp-file-name js-value">Browse Files</span>
                            <input type="file" name="event-image" id="custom-file-upload" />
                        </label>
                        <button class="w-100 btn btn-lg btn-primary" type="submit">
                            Create Event
                        </button>

                    </form>
                </div>
            </div>
        </main>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script>
            $(document).ready(function() {

                // get the name of uploaded file
                $('input[type="file"]').change(function() {
                    var value = $("input[type='file']").val();
                    $('.js-value').text(value);
                });

            });
            // Get the form element
            const form = document.forms[0];

            // Add an event listener for the form submit event
            form.addEventListener('submit', (e) => {
                // Prevent the default form submission behavior
                e.preventDefault();

                // Create a new FormData object and append the form data to it
                const formData = new FormData(form);

                // Send a POST request to the PHP script on the server
                const xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                        // redirect to events page if everything is ok
                        window.location.href = 'events.php';
                    }
                };
                xhr.open('POST', '<?php echo $_SERVER['PHP_SELF'] ?>');
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        // Display the response from the server
                        console.log(xhr.responseText);
                    } else {
                        // Display an error message if the request failed
                        console.error(`Error ${xhr.status}: ${xhr.statusText}`);
                    }
                };
                xhr.send(formData);
            });
        </script>
        <!-- Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    </body>

    </html>
<?php } ?>