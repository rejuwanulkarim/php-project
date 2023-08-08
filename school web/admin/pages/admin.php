<?php


else {
    $sql = "SELECT * FROM `students` WHERE `section`='$sec_data' AND `class`='$class_data' ";
    $result = mysqli_query($connection, $sql);
    $output = [];
    if ($num = mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $output[] = $row;
        }
        echo json_encode(array("status" => "success", "data" => $output));
    } else {
        echo json_encode(array("status" => "empty"));
    }





    // echo json_encode(array("status" => "empty"));
}