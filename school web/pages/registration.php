<?php
include "../admin/assets/connection.php";
function user()
{
    echo '<div class="user-error">User Alredy Exist</div>';
}
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['studentname'];
    $student_name = str_replace("\"", "-", $_POST['studentname']);
    $student_name = str_replace("'", "/", $_POST['studentname']);

    $fathersname = str_replace("\"", "-", $_POST['studentfathersname']);
    $fathersname = str_replace("'", "-", $_POST['studentfathersname']);

    $gender = str_replace("\"", "-", $_POST['gender']);
    $gender = str_replace("'", "-", $_POST['gender']);

    $contactnumber = str_replace("\"", "-", $_POST['contactnumber']);
    $contactnumber = str_replace("'", "-", $_POST['contactnumber']);

    $email = str_replace("\"", "-", $_POST['email']);
    $email = str_replace("'", "-", $_POST['email']);

    $studentdob = str_replace("\"", "-", $_POST['studentdob']);
    $studentdob = str_replace("'", "-", $_POST['studentdob']);

    $admissionclass = str_replace("\"", "-", $_POST['admissionclass']);
    $admissionclass = str_replace("'", "-", $_POST['admissionclass']);

    $studentaddress = str_replace("\"", "-", $_POST['studentaddress']);
    $studentaddress = str_replace("'", "-", $_POST['studentaddress']);


    $year = date("Y");
    $sql = "SELECT * FROM `students` WHERE `email`='$email'";
    $result = mysqli_query($connection, $sql);
    if (mysqli_num_rows($result) > 0) {
        user();
    } else {

        $sql = "INSERT INTO `students` (`name`,`fathers_name`,`gender`,`phone_no`,`email`,`DOB`,`class`,`address`,`year`,`admission_date`) VALUES ('$student_name','$fathersname','$gender','$contactnumber','$email','$studentdob','$admissionclass','$studentaddress',$year,current_timestamp())";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            // echo "success";
            $time = time();


            $_SESSION['registrtion'] = true;
            $_SESSION['uname'] = $email;
            $_SESSION['name'] = $student_name;
            header("location:./welcome.php");
        } else {
            echo "un success";
        }
    }
}
if (isset($_SESSION['registrtion']) == true) {

    header("location:./welcome.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registretion->demo</title>
    <link rel="stylesheet" href="../assets/main.css">
    <link rel="stylesheet" href="../assets/registretion.css">
    <link rel="stylesheet" href="../assets/readmission.css">
    <link rel="stylesheet" href="../assets/footer.css">
    <link rel="stylesheet" href="../assets/phone.css">
</head>

<body pagename="registretion">
    <?php
    include "./navbar.php";
    ?>

    <div id="loading">
        <svg>
            <use href="http://localhost/karim/school web/svg_logos/svg_icons.svg#loading"></use>
        </svg>
    </div>
    <section class="registretion_section">
        <div class="inner_body">
            <h5 class="registretion_heading">New Registretion</h5>
            <form action="./registration.php" method="post" class="_col align_center">
                <div class="registretion_form_body">

                    <div class="_row">
                        <label for="studentfirstname" class="registretion_lable">Full Name of Student: &nbsp;</label>
                        <input type="text" name="studentname" class="registretion_input" maxlength="20" required>
                    </div>
                    <div class="_row">
                        <label for="fathersname" class="registretion_lable">Student Father's Name &nbsp;:&nbsp;</label>
                        <input type="text" name="studentfathersname" class="registretion_input" maxlength="30" required>
                    </div>


                    <div class="_row">
                        <label for="contactemail" class="registretion_lable">Gender:&nbsp;</label>
                        <div class="gender_input">
                            <input type="radio" name="gender" value="Male" class="" maxlength="30">
                            <input type="radio" name="gender" value="Female" class="" maxlength="30">
                            <input type="radio" name="gender" value="Others" class="" maxlength="30">
                        </div>
                    </div>

                    <div class="_row">
                        <label for="contactnumber" class="registretion_lable">Phone Number:&nbsp;</label>
                        <input type="number" name="contactnumber" class="registretion_input" maxlength="14" required>
                    </div>
                    <div class="_row">
                        <label for="contactemail" class="registretion_lable">Email:&nbsp;</label>
                        <input type="email" name="email" id='email' class="registretion_input" onblur='username_checker(this.value)' maxlength="30" required>
                    </div>

                    <div class="_row">
                        <label for="DOB" class="registretion_lable">Date Of Birth:&nbsp;</label>
                        <input type="datetime-local" name="studentdob" class="date_input" min="1995-01-01" max="<?= date("Y") - 9 ?>-12-31" required>
                    </div>
                    <div class="_row">
                        <label for="class" class="registretion_lable">Admission Class:&nbsp;</label>
                        <select name="admissionclass" id="admissionclass" class="registretion_input">
                            <option value="Class I">Class I</option>
                            <option value="Class II">Class II</option>
                            <option value="Class III">Class III</option>
                            <option value="Class IV">Class IV</option>
                            <option value="Class V">Class V</option>
                            <option value="Class VI">Class VI</option>
                            <option value="Class VII">Class VII</option>
                            <option value="Class VIII">Class VIII</option>
                            <option value="Class IX">Class IX</option>
                            <option value="Class X">Class X</option>
                        </select>
                    </div>
                    <div class="_row">
                        <label for="address" class="registretion_lable">Student Address:&nbsp;</label>
                        <input type="text" name="studentaddress" class="registretion_input" maxlength="120" required>
                    </div>
                </div>
                <p id="user-alert"><i>Email Alredy registered</i></p>


                <input type="submit" value="Submit" class="submit_btn">
            </form>
            <!-- <div > -->
            <!-- </div> -->
        </div>
    </section>








    <?php
    include "./footer.php";
    ?>



    <script>
     let pagename = document.getElementsByTagName('body')[0].getAttribute('pagename')
        let navbar = document.getElementsByClassName('nav-item')

        for (let j = 0; j < navbar.length; j++) {
            let navid = navbar[j].children[0].id
            if (navid == pagename) {
                document.getElementById(pagename).setAttribute('class', 'nav-link active')
            }
        }
    </script>
    <script src="../assets/bundle.js"></script>
</body>

</html>