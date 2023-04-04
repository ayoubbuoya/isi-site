<?php
// Get the session variables
session_start();
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $role = $_SESSION['role'];

    // Output the variables as a JSON object
    echo json_encode(
        array(
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'role' => $role
        )
    );
}
