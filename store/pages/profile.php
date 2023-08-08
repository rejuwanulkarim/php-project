<?php
session_start();
include "../connections/connections.php";
$slno = $_SESSION['slno'];
$profile = $_SESSION['profile'];

$error = "";
// if ($profile != true) {
//     header("location:../index.php");
// }
$profile = $_SESSION['profile'];
if ($profile == true) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $password = $_POST['password'];
        $cpassword = $_POST['confirm-password'];
        if ($password == $cpassword) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $sql = "UPDATE `authentication` SET `password`='$password' WHERE `authentication`.`slno`=$slno";
            $result = mysqli_query($connection, $sql);
            if ($result) {
                echo "success";
                header("location:./user.php");
            } else {
                $error = '<p class="error">Password Not Match</p>';
            }
        }else{
            $error = '<p class="error">Passwords are Not same</p>';
            
        }
    }
} else {
    header("location:./user.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="../assets/nav.css">
</head>

<body>
    <div class="alert-msg-nor">
        <div id="massage"></div>
    </div>
    <?php
    include "./navbar.php";
    $sql = "SELECT * FROM `authentication` WHERE `slno`=$slno";
    $result = mysqli_query($connection, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $username = $row['username'];
            echo "   <form action='./profile.php' class='updatate-form' method='post'>
<h3 class='heading'>Update User</h3>
<input type='email' name='user-name' value='$username' id='customer-name' class='update-inputs user-add-inputs' placeholder='User Name' required disabled>
<input type='text' name='password' value='' id='customer-password' class='update-inputs user-add-inputs update-passwords' placeholder='Enter New Password' required>
<input type='text' name='confirm-password' value='' id='customer-confirm-password-password' class='update-inputs user-add-inputs update-passwords' placeholder='Enter New Password' required>
$error

<button type='submit' id='add-btn' class='submit'>Update +</button>
</form>";
        }
    }

    ?>

    <script>
        let UpdateForm = document.getElementsByClassName("updatate-form")[0];
        let passwords = document.getElementsByClassName("update-passwords");
        for (let i = 0; i < passwords.length; i++) {
            passwords[i].addEventListener("input", () => {
                let err = document.createElement("p");
                if (passwords[0].value != passwords[1].value) {
                    err.textContent = "confirm password are not same";
                    err.className = "error";
                    UpdateForm.appendChild(err)
                } else {
                    let err = document.getElementsByClassName('error')[0]
                    UpdateForm.removeChild(err)
                }
            });
        }
    </script>

</body>

</html>