<?php
session_start();
// delete account image 
if (unlink("./imgs/account.png")) {
    echo "Image deleted";
} else {
    echo "Erreur Deleting Image";
}
session_destroy();
header("Location: index.php");
