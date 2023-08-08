<?php

include "../assets/connection.php";




$input = file_get_contents("php://input");



$datadecode = json_decode($input, true);
$query_type = $datadecode['type'];


if ($query_type == "student-data") {
    $action = $datadecode['action'];
    if ($action == "read") {
        $sql = "SELECT * FROM `students`";
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
    } elseif ($action == "delete") {
        $data = $datadecode['data'];
        $sql = "SELECT * FROM `students` WHERE `slno`='$data'";
        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            $sql = "DELETE FROM `students` WHERE `students`.`slno`='$data'";
            $result = mysqli_query($connection, $sql);

            if ($result) {
                echo json_encode(array("status" => "success"));
                mysqli_close($connection);
            } else {
                echo json_encode(array("status" => "error"));
                mysqli_close($connection);
            }
        } else {
            echo json_encode(array("status" => "empty"));
            mysqli_close($connection);
        }
    } elseif ($action == "search-sec") {
        $sec_data = $datadecode['sec-data'];
        $class_data = $datadecode['class-data'];

        $sql = "";
        if ($class_data == "All" && $sec_data == "All") {
            $sql = "SELECT * FROM `students`";
        } elseif ($class_data != "All") {
            $sql = "SELECT * FROM `students` WHERE `section`='$sec_data' AND `class`='$class_data'";
        } elseif ($class_data == "All") {
            $sql = "SELECT * FROM `students` WHERE `section`='$sec_data'";
        }
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
    } elseif ($action == "search-class") {

        $class_data = $datadecode['data'];
        if ($class_data == "All") {
            $sql = "SELECT * FROM `students`";
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
        } else {
            $sql = "SELECT * FROM `students` WHERE `class`='$class_data'";
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
        }
    } elseif ($action == "search-year") {
        $sec_data = $datadecode['sec-data'];
        $class_data = $datadecode['class-data'];
        $admission_data = $datadecode['admission-year'];
        $sql = "";
        if ($sec_data == "All" || $class_data == "All") {
            $sql = "SELECT * FROM `students` WHERE `year`='$admission_data'";
        } elseif ($sec_data == "All") {
            $sql = "SELECT * FROM `students` WHERE `class`='$class_data'";
        } elseif ($class_data == "All") {
            $sql = "SELECT * FROM `students` WHERE `section`='$sec_data'";
        } elseif ($sec_data != "All" && $class_data != "All") {
            $sql = "SELECT * FROM `students` WHERE `class`='$class_data' AND `section`='$sec_data' AND `year`='$admission_data'";
        }
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
    } elseif ($action == "student-edit-fetch") {
        // echo "";
        $data = $datadecode['data'];
        $sql = "SELECT * FROM `students` WHERE `slno`='$data'";
        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result)) {
            $output = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $output[0] = $row;
            }
            echo json_encode(array("status" => "success", "data" => $output));
            mysqli_close($connection);
        }
    } elseif ($action == 'student-update') {
        $data = $datadecode['data'];
        $slno = $data['slno'];
        $name = $data['name'];
        $class = $data['class'];
        $section = $data['section'];
        $fathers_name = $data['father-name'];
        $phone = $data['phone'];
        $address = $data['address'];
        $roll = $data['roll'];
        // echo json_encode($uname);
        $sql = "UPDATE `students` SET `name`='$name',`class`='$class',`section`='$section',`fathers_name`='$fathers_name',`phone_no`='$phone',`address`='$address',`roll_no`='$roll' WHERE `slno`='$slno'";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            echo json_encode(array("status" => "success"));
        }
    }
} elseif ($query_type == "admin-data") {
    $action = $datadecode['action'];
    if ($action == "delete") {
        $slno = $datadecode['data'];
        $sql = "SELECT * FROM `admins` WHERE `slno`='$slno'";
        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            $sql = "DELETE FROM admins WHERE `admins`.`slno`='$slno'";
            $result = mysqli_query($connection, $sql);
            if ($result) {
                echo json_encode(array("status" => "success"));
            } else {
                echo json_encode(array("status" => "error"));
            }
        }
    } elseif ($action == "uname-check") {
        $uname = $datadecode['data'];
        $sql = "SELECT * FROM `admins` WHERE `email`='$uname'";
        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo json_encode(array("status" => "exist"));
        } else {
            echo json_encode(array("status" => "success"));
        }
    } elseif ($action == "admin-read") {
        $output = [];
        $sql = "SELECT * FROM `admins`";
        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $output[] = $row;
            }
            echo json_encode($output);
            mysqli_close($connection);
        } else {
            echo json_encode(array("status" => "empty"));
            mysqli_close($connection);
        }
    } elseif ($action == "admin-search") {
        $id = $datadecode['data'];
        $sql = "SELECT * FROM `admins` WHERE `id`='$id'";
        $result = mysqli_query($connection, $sql);
        $output = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $output[] = $row;
            }
            echo json_encode($output);
            mysqli_close($connection);
        } else {
            echo json_encode(array("status" => "empty"));
            mysqli_close($connection);
        }
    } elseif ($action == "admin-insert") {
        echo json_encode(array("status" => "success"));
        mysqli_close($connection);
    }
} elseif ($query_type == "login-data") {
    function otpsender($user, $tablename)
    {
        include "../assets/connection.php";
        $otp = rand(10000, 19999);

        $sql = "UPDATE `$tablename` SET `OTP`='$otp' WHERE `$tablename`.`email`='$user'";
        $result = mysqli_query($connection, $sql);

        if ($result) {
            require_once("../classes/api/smtp/PHPMailerAutoload.php");
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 587;
            $mail->SMTPSecure = "tls";
            $mail->SMTPAuth = true;
            $mail->Username = "karimdr341@gmail.com";
            $mail->Password = "fakqlhcursmxyjmy";
            $mail->SetFrom("karimdr341@gmail.com");
            $mail->addAddress("$user");
            $mail->IsHTML(true);
            $mail->Subject = "OTP";
            $mail->Body = "OTP is $otp";
            $mail->SMTPOptions = array('ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => false
            ));
            if ($mail->send()) {
                echo json_encode(array("status" => "success"));
            } else {
                echo json_encode(array("status" => "error"));
            }
        }
    }
    $action = $datadecode['action'];
    $data = $datadecode['data'];
    if ($action == "otp-send") {
        $sql = "SELECT * FROM `admins` WHERE `email`='$data'";
        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            otpsender($data, "admins");
            mysqli_close($connection);
        } else {
            $sql = "SELECT * FROM `students` WHERE `email`='$data'";
            $result = mysqli_query($connection, $sql);
            if (mysqli_num_rows($result) > 0) {
                otpsender($data, "students");
                mysqli_close($connection);
            } else {
                $sql = "SELECT * FROM `staffs` WHERE `email`='$data'";
                $result = mysqli_query($connection, $sql);
                if (mysqli_num_rows($result) > 0) {
                    otpsender($data, "staffs");
                    mysqli_close($connection);
                } else {
                    echo json_encode(array("status" => "empty"));
                    mysqli_close($connection);
                }
            }
        }
    }
} elseif ($query_type == "notice-data") {
    // echo json_encode(array("status"));
    $slno = $datadecode[' '];
    $sql = "SELECT * FROM `notices` WHERE `slno`='$slno'";
    $result = mysqli_query($connection, $sql);
    if (mysqli_num_rows($result) > 0) {
        $picture_name = "";
        while ($row = mysqli_fetch_assoc($result)) {
            $picture_name = $row['subtitle'];
        }
        $sql = "DELETE FROM `notices` WHERE `notices`.`slno`='$slno'";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            echo json_encode(array("status" => "success"));
            mysqli_close($connection);
        }
    }
} elseif ($query_type == "registration-data") {
    $data = $datadecode['data'];
    $sql = "SELECT * FROM `students` WHERE `email`='$data'";
    $result = mysqli_query($connection, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo json_encode(array("status" => "exist"));
    } else {
        echo json_encode(array("status" => "empty"));
    }
} elseif ($query_type == "staff-data") {
    $action = $datadecode['action'];
    if ($action == "read") {
        $sql = "SELECT * FROM `staffs`";
        $result = mysqli_query($connection, $sql);
        $output = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $output[] = $row;
            }
            echo json_encode(array("status" => "success", "data" => $output));
            mysqli_close($connection);
        } else {
            echo json_encode(array("status" => "empty"));
            mysqli_close($connection);
        }
    } elseif ($action == "read-single") {
        $data = $datadecode['data'];
        $sql = "SELECT * FROM `staffs` WHERE `slno`='$data'";
        $result = mysqli_query($connection, $sql);
        $output = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $output[] = $row;
            }
            echo json_encode(array("status" => "success", "data" => $output));
            mysqli_close($connection);
        } else {
            echo json_encode(array("status" => "empty"));
            mysqli_close($connection);
        }
    } elseif ($action == "delete") {
        $data = $datadecode['data'];
        $output = "";
        $sql = "SELECT * FROM `staffs` WHERE `slno`='$data'";
        if (mysqli_num_rows(mysqli_query($connection, $sql)) > 0) {
            $sql = "DELETE FROM `staffs` WHERE `staffs`.`slno` = '$data'";
            $result = mysqli_query($connection, $sql);
            if ($result) {
                $output = "deleted";
            } else {
                $output = "not-deleted";
            }
        } else {
            $output = "empty";
        }

        mysqli_close($connection);
        echo json_encode(array("status" => $output));
    } elseif ($action == "update") {
        $data = $datadecode['data'];
        $slno = $data['slno'];
        $name = $data['name'];
        $subject = $data['subject'];
        $phone = $data['phone'];
        $email = $data['email'];
        $address = $data['address'];
        $joining_date = $data['joining_date'];
        $sql = "SELECT *FROM `staffs` WHERE `slno`=$slno";
        $result = mysqli_query($connection, $sql);
        $output = "";
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $sql = "UPDATE `staffs` SET `name`='$name',`subject`='$subject',`phone`='$phone',`email`='$email',`address`='$address',`joining_date`='$joining_date' WHERE `staffs`.`slno`='$slno'";
                $result = mysqli_query($connection, $sql);
                if ($result) {
                    // echo json_encode(array("status" => "success"));
                    $output = "success";
                } else {
                    $output = "error";
                }
            }
        } else {
            // echo json_encode(array("status" => "empty"));
            $output = "empty";
        }
        mysqli_close($connection);
        echo json_encode(array("status" => $output));
    }
} elseif ($query_type == "gallery-path-read") {
    $path = $datadecode['data'];
    $scanpath = "../../_images/webImages/gallery_slider/$path";

    $folderPath = scandir($scanpath, SCANDIR_SORT_DESCENDING);
    $output = [];
    for ($i = 0; $i < sizeof($folderPath); $i++) {
        $output = [$folderPath];
    }
    echo json_encode(array("status" => "success", "data" => $output));
}
