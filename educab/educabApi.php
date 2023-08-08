<?php



header("Access-Control-Allow-Origin: *");

$api = "QZWC6S82D87Z1Z2A";
$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST') {
    $input = file_get_contents('php://input');
    if ($input != "") {
        $json = json_decode($input, true);
        $api_key = $json['api_key'];
        if ($api == $api_key) {
            require "./connection.php";
            $action = $json['action'];
            if ($action == "read") {
                // Post method read
            } elseif ($action == "update") {
                // Post method Update
            }
        } else {
            echo "key not match";
        }
    } else {
        echo json_encode("Api Key not found");
    }
} elseif ($method == "GET") {
    if (isset($_GET['api_key']) != "") {
        $api_key = $_GET['api_key'];
        if ($api == $api_key) {

            $action = $_GET["action"];


            if ($action == "read") {
                // Get method read
            } elseif (isset($_GET["api_key"]) && $action == "update" && isset($_GET["field1"])) {
                $data = $_GET["field1"];
                $sql = "UPDATE `data` SET `led1`='$data' WHERE `data`.`slno`=9";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo json_encode(array("status" => "success"));
                    mysqli_close($conn);
                } else {
                    echo json_encode(array("status" => "error"));
                    mysqli_close($conn);
                }
            } elseif (isset($_GET["api_key"]) && $action == "update" && isset($_GET["field2"])) {
                $data = $_GET["field2"];
                $sql = "UPDATE `data` SET `led2`='$data' WHERE `data`.`slno`=9";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo json_encode(array("status" => "success"));
                    mysqli_close($conn);
                } else {
                    echo json_encode(array("status" => "error"));
                    mysqli_close($conn);
                }
            } else {
                echo "Please Enter all Things to work Properly(Enter:Api Key,Action,Field Name)";
            }
        } else {
            echo json_encode(array("status" => "Not Match"));
        }
    } else {
        echo "Enter api Key";
    }
} else {
    echo "Use Only GET & POST Request";
}
