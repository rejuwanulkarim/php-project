<?php

use function PHPSTORM_META\type;

include "../assets/connection.php";

session_start();
$login = $_SESSION['login'];
$password = $_SESSION['password'];
$email = $_SESSION['email'];
$user_type = $_SESSION['user-type'];
$subject = $_SESSION['subject_name'];
$sub_name = strtolower($subject);
if ($login != true && $password != true) {
    if ($user_type != 'admin' || $user_type != 'staff')
        header("location:../../pages/login.php");
}




// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $rollno = $_POST['rollno'];
//     $mark = $_POST['mark'];
//     $theory_subject=$subject.'_theo';
//     $oral_subject=$subject.'_oral';
// $sql = "INSERT INTO `student_result` (`english`) VALUE ('$mark') WHERE `rollno`='$rollno'";
// $sql = "SELECT * FROM `student_result` WHERE `rollno`";
// $result = mysqli_query($connection, $sql);
// $sql = "UPDATE `students` SET `$theory_subject`='$theoryMark' AND `$oral_subject`='$oralMark' WHERE ";
// }

// $rollNo = $_SESSION['rollNo'];
// $rollNo = "<script> let a=sessionStorage.getItem('lastname');</script>";
function result_status($text)
{
    echo "<div class='result-upload-status'>$text</div>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/admin.css">
    <title>Student Result</title>
</head>
<a href="./logout.php" class="result-logout-btn">
    <svg>
        <use href="http://localhost/karim/school web/svg_logos/svg_icons.svg#power"></use>
    </svg>
</a>

<body pagename="result-page">

    <section class="result-sec">
        <div class="result-left">
            <h2>Update Result</h2>
            <form action="./result.php">


                <input type="number" name="rollno" id="rollno" class="result-input" placeholder="Enter Update Roll No" maxlength="4">
                <input type="number" name="theory_mark" id="mark" class="result-input" placeholder="Enter Update Mark">

                <input type="number" name="oralmark" id="oral" class="result-input" placeholder="Enter Update oral">
                <input type="submit" value="Submit">
            </form>
        </div>
        <div class="result-right">
            <table id="result-table">
                <tbody>
                    <tr>
                        <td rowspan="2">Slno</td>
                        <td rowspan="2">Roll No</td>
                        <td rowspan="2">Name</td>
                        <td colspan="3">Mark</td>
                        <td rowspan="2">Grade</td>
                        <td rowspan="2">Action</td>
                    </tr>
                    <tr>
                        <td>Written<br>out of 90</td>
                        <td>Oral<br>out of 10</td>
                        <td>Total<br>out of 100</td>
                    </tr>


                    <?php
                    // student result table
                    $slno = 0;
                    $class = "";
                    if ($_GET) {
                        $class = $_GET['class'];
                    }
                    $sql = "";
                    if ($class == 'All' || $class == 'ALL' || $class == 'all') {
                        $sql = "SELECT * FROM `students` ORDER BY `slno` DESC";
                    } else {
                        $sql = "SELECT * FROM `students` WHERE `class`='$class' ORDER BY `slno` DESC";
                    }
                    $result = mysqli_query($connection, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $theory = $row[$sub_name . '_theo'];
                            $oral = $row[$sub_name . '_oral'];
                            $name = $row['name'];
                            $rollno = $row['roll_no'];
                            $total = $theory + $oral;
                            switch ($total) {
                                case $total >= 90:
                                    if ($total == 0) {
                                        $grade = "D";
                                    } else {
                                        $grade = "AA";
                                    }
                                    break;
                                case $total >= 80:
                                    $grade = "A+";
                                    break;
                                case $total >= 60:
                                    $grade = "A";
                                    break;
                                case $total >= 45:
                                    $grade = "B+";
                                    break;
                                case $total >= 35:
                                    $grade = "B";
                                    break;
                                case $total >= 25:
                                    $grade = "C";
                                    break;

                                default:
                                    $grade = "D";
                                    break;
                            }
                            $slno++;
                            echo "<tr>
                                <td>$slno</td>
                                <td>$rollno</td>
                                <td>$name</td>
                                <td id='theoryMark'>$theory</td>
                                <td id='oralMark'>$oral</td>
                                <td>$total</td>
                                <td>$grade</td>
                                <td><svg class='result-edit' onclick='resultEdit(this)'>
                                <use href='http://localhost/karim/school web/svg_logos/svg_icons.svg#edit'></use>
                                </svg>
                                </td>
                                </tr>";
                        }
                    } else {
                        echo "<tr>
                        <td colspan='8' style='color:red !important;'>NO Student Here:)</td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </section>
    <?php
    // update student result
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $theoryMark = $_POST['modal-theory'];
        $oralMark = $_POST['modal-oral'];
        $rollNo = $_POST['ROllNo'];
        $name = $_POST['modal-name'];
        $theory_subject = $sub_name . '_theo';
        $oral_subject = $sub_name . '_oral';
        $sql = "UPDATE `students` SET `$theory_subject` = '$theoryMark' , `$oral_subject`='$oralMark',`name`='$name' WHERE `students`.`roll_no` = '$rollNo'";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            header("location:./result.php?class=$class");
            result_status("Success");
        } else {
            echo "error";
        }
    }

    // echo $ROllNo;

    echo '
    <form class="modal" method="post" id="result-edit-modal" action="./result.php?class=' . $class . '">';
    ?>
    <h3>Update Roll No:&nbsp;<span id="ModalrollNo">45</span></h3>
    <div class="flex-col">
        <label for="">Name:</label>
        <input type="text" id="modal-name" name="modal-name">
    </div>
    <div class="flex-col">
        <label for=""><b>Theory Mark:</b></label>
        <input type="number" id="modal-theory" name="modal-theory">
        <input type="number" id="rollNO" name="ROllNo" style="display:none;">
    </div>
    <div class="flex-col">
        <label for=""><b>Oral Mark:</b></label>
        <input type="number" id="modal-oral" name="modal-oral">
    </div>
    <div class="flex-row modal-action-btn">
        <button onclick="modalCloser()" type="button">Close</button>
        <button onclick="modalChangesSave()" type="submit">Save Changes</button>
    </div>
    </from>

    <script src="../assets/admin.js"></script>
</body>

</html>