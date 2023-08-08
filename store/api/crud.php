<?php
$api_key = "7b951ca15de226dfaf51232374a150eb";
$accept_header = $_SERVER['HTTP_X_API_KEY'];

if ($accept_header == $api_key) {
    include "../connections/connections.php";
    $json = file_get_contents('php://input');
    $decoded = json_decode($json, true);
    $query = $decoded['action'];
    if ($query == "read") {
        $sql = "SELECT * FROM `mystore`  ORDER BY slno DESC";
        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            $output = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $output[] = $row;
            }
            echo json_encode(array("status" => "success", "data" => $output));
            mysqli_close($connection);
        } else {
            echo json_encode(array("status" => "empty"));
            mysqli_close($connection);
        }
    } elseif ($query == "write") {
        $data = $decoded['data'];
        $name = $data['name'];
        $print_type = $data['print_type'];
        $quantity = $data['quantity'];
        $print_cost = $data['print_cost'];
        $total_price = $quantity *  $print_cost;
        $payment_type = $data['payment_type'];
        $sql = "INSERT INTO `mystore` (`name`,`print_type`,`print_quantity`,`cost`,`payment_type`,`total_price`,`date`) VALUES ('$name','$print_type','$quantity','$print_cost','$payment_type','$total_price',CURRENT_TIME())";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            echo json_encode(array("status" => "success"));
        } else {
            echo json_encode(array("status" => "error"));
        }
    } elseif ($query == "forgot") {
        include "../connections/connections.php";
        $data = $decoded['data'];
        $email = $data['email'];
        $sql = "SELECT * FROM `authentication` WHERE `username`='$email'";
        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) > 0) {

            $otp = rand(100000, 999999);
            $Update_sql = "UPDATE `authentication` SET `OTP` = '$otp' WHERE `authentication`.`username`='$email'";
            $result = mysqli_query($connection, $Update_sql);

            if ($result) {
                require_once("../api/smtp/PHPMailerAutoload.php");
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = "smtp.gmail.com";
                $mail->Port = 587;
                $mail->SMTPSecure = "tls";
                $mail->SMTPAuth = true;
                $mail->Username = "karimdr341@gmail.com";
                $mail->Password = "fakqlhcursmxyjmy";
                $mail->SetFrom("karimdr341@gmail.com");
                $mail->addAddress("$email");
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
                    mysqli_close($connection);
                } else {
                    echo json_encode(array("status" => "error"));
                    mysqli_close($connection);
                }
            } else {
                echo json_encode(array("status" => "error"));
                mysqli_close($connection);
            }
            // echo json_encode(array("status" => "success"));
        } else {
            echo json_encode("un success");
        }
    } elseif ($query == "delete") {
        $data = $decoded['data'];
        if ($data != "") {
            $sql = "SELECT * FROM `mystore` WHERE `slno`=$data";
            $result = mysqli_query($connection, $sql);
            if (mysqli_num_rows($result) > 0) {
                $output = "";
                $sql = "DELETE FROM `mystore` WHERE `mystore`.`slno` =$data";
                $result = mysqli_query($connection, $sql);
                if ($result) {
                    $output = "success";
                } else {
                    $output = "error";
                }
                echo json_encode(array("status" => $output));
                mysqli_close($connection);
            } else {
                echo json_encode(array("status" => "empty"));
                mysqli_close($connection);
            }
        }
    } elseif ($query == "overview") {
        $sub_query = $decoded['data'];
        // echo json_encode("success");
        $sql = "SELECT * FROM `mystore`";
        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) > 0) {


            $sql = "SELECT * FROM `mystore` WHERE `payment_type`='due'";
            $result = mysqli_query($connection, $sql);
            $due[] = "";
            while ($row = mysqli_fetch_assoc($result)) {
                $due[] = $row['total_price'];
            }
            $sql = "SELECT * FROM `mystore`";
            $result = mysqli_query($connection, $sql);
            $due[] = "";
            while ($row = mysqli_fetch_assoc($result)) {
                $total[] = $row['total_price'];
            }
            $sql = "SELECT * FROM `mystore` WHERE `print_type`='cp'";
            $result = mysqli_query($connection, $sql);
            $cp[] = "";
            while ($row = mysqli_fetch_assoc($result)) {
                $cp[] = $row['print_quantity'];
            }
            $sql = "SELECT * FROM `mystore` WHERE `print_type`='bp'";
            $result = mysqli_query($connection, $sql);
            $bp[] = "";
            while ($row = mysqli_fetch_assoc($result)) {
                $bp[] = $row['print_quantity'];
            }
            $sql = "SELECT * FROM `mystore` WHERE `print_type`='mp'";
            $result = mysqli_query($connection, $sql);
            $mp[] = "";
            while ($row = mysqli_fetch_assoc($result)) {
                $mp[] = $row['print_quantity'];
            }
            $sql = "SELECT * FROM `mystore` WHERE `print_type`='bx'";
            $result = mysqli_query($connection, $sql);
            $bx[] = "";
            while ($row = mysqli_fetch_assoc($result)) {
                $bx[] = $row['print_quantity'];
            }
            $sql = "SELECT * FROM `mystore` WHERE `print_type`='cx'";
            $result = mysqli_query($connection, $sql);
            $cx[] = "";
            while ($row = mysqli_fetch_assoc($result)) {
                $cx[] = $row['print_quantity'];
            }
            $sql = "SELECT * FROM `mystore` WHERE `print_type`='others'";
            $result = mysqli_query($connection, $sql);
            $others[] = "";
            while ($row = mysqli_fetch_assoc($result)) {
                $others[] = $row['print_quantity'];
            }




            echo json_encode(array(
                array("status" => "success"),
                array("status" => "success", "dtype" => "due", "data" => $due),
                array("status" => "success", "dtype" => "total", "data" => $total),
                array("status" => "success", "dtype" => "cp", "data" => $cp),
                array("status" => "success", "dtype" => "bp", "data" => $bp),
                array("status" => "success", "dtype" => "mp", "data" => $mp),
                array("status" => "success", "dtype" => "bx", "data" => $bx),
                array("status" => "success", "dtype" => "cx", "data" => $cx),
                array("status" => "success", "dtype" => "others", "data" => $others)
            ));
            mysqli_close($connection);
        } else {
            echo json_encode(array("status" => "empty"));
            mysqli_close($connection);
        }
    } elseif ($query == "payment_update") {
        $data = $decoded['data'];
        $slno = $data['serial'];
        $payment_type = $data['payment'];
        // echo json_encode($slno);
        $sql = "UPDATE `mystore` SET `payment_type` = '$payment_type' WHERE `mystore`.`slno` = '$slno'";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            echo json_encode("success");
        }
    } elseif ($query == "login-alert") {
        require "../connections/connections.php";
        $email = $decoded['data']['email'];

        echo json_encode($email);
        // $email = "rejuwanulkarim@gmail.com";
        // $req = $_SERVER['HTTP_USER_AGENT'];
        // $ip = $_SERVER['REMOTE_ADDR'];
        // $sql = "INSERT INTO `history` (`history`,`ip`,`date`) VALUES ('$req','$ip',CURRENT_TIMESTAMP());";
        // $result = mysqli_query($connection, $sql);
        // $body = "<b style='color:red;'>New Login Detected</b><br><br><b>Browser Details:-</b>$req<br><b>IP:-</b>$ip<br>Go to website and check<a href='http://rejublogspot.epizy.com/'>Click Here to check</a>";

        // if ($result) {
        //     require_once("./smtp/PHPMailerAutoload.php");
        //     $mail = new PHPMailer(true);
        //     $mail->isSMTP();
        //     $mail->Host = "smtp.gmail.com";
        //     $mail->Port = 587;
        //     $mail->SMTPSecure = "tls";
        //     $mail->SMTPAuth = true;
        //     $mail->Username = "karimdr341@gmail.com";
        //     $mail->Password = "fakqlhcursmxyjmy";
        //     $mail->SetFrom("karimdr341@gmail.com");
        //     $mail->addAddress("$email");
        //     $mail->IsHTML(true);
        //     $mail->Subject = "Login Alert";
        //     $mail->Body = "$body";
        //     $mail->SMTPOptions = array('ssl' => array(
        //         'verify_peer' => false,
        //         'verify_peer_name' => false,
        //         'allow_self_signed' => false
        //     ));
        //     if ($mail->send()) {
        //         echo json_encode(array("status" => "success"));
        //         mysqli_close($connection);
        //     } else {
        //         echo json_encode(array("status" => "error"));
        //         mysqli_close($connection);
        //     }
        // } else {
        //     echo json_encode(array("status" => "error"));
        //     mysqli_close($connection);
        // }
    }
} else {

    echo json_encode("invalid User");
    mysqli_close($connection);
}
