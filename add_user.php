<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
</head>

<body>
    <?php

    require_once "db_connect.php";

    // get params
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    // echo "<br />" . "Name : " . $name;
    // echo "<br />" . "Email : " . $email;
    // echo "<br />" . "Password : " . $password;
    // echo "<br />" . "Role : " . $role;

    $sql = "INSERT INTO users(name, email, password, role) VALUES ('$name', '$email', '$password', '$role');";

    if (mysqli_query($conn, $sql)) {
        // redirect to login page 
        header("Location: login.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // close connection
    mysqli_close($conn);
    ?>

</body>

</html>