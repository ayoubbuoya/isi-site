<?php

$org = "/home/ayoubamer/Workspace/ISI/Web/Warith/db_imgs/ayoub.jpg";

$new = "./imgs/account.jpg";


if (copy($org, $new)) {
    // Rename the copied image file to the new name
    // $newImageName = 'new_image_name.jpg';
    // $newImageFullPath = dirname($newImagePath) . '/' . $newImageName;
    // rename($newImagePath, $newImageFullPath);
    echo 'Image copied and renamed successfully.';
} else {
    echo 'Error copying image.';
}
