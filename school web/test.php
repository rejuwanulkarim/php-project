<?php

$path = "./_images/webImages/gallery_slider/staffs";
// $scanpath = "../../_images/webImages/gallery_slider/$path";
$folderPath = scandir($path, SCANDIR_SORT_DESCENDING);

for ($i = 0; $i < sizeof($folderPath); $i++) {
    // if ($folderPath[$i] != "." && $folderPath[$i] != "..") {
    //     echo "<br>$folderPath[$i]";
    // }


    if (file_exists($path . "/" . $folderPath[$i])) {
        echo "<br>exist";
    }
}
