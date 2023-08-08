<?php
session_start();
$success = $_SESSION['registrtion'];
$uname = $_SESSION['uname'];
$name = $_SESSION['name'];
if ($success != true) {
    header("location:./registration.php");
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/main.css">

    <title>WELCOME</title>
</head>

<body pagename="registretion">

    <style>
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            z-index: -1;
            height: 100vh;
            width: 100%;
            background: linear-gradient(#000000ba, #000000ba), url(../_images/webImages/registretion/singup/bg2.jpg);
            background-size: cover;
        }

        .modal-log-details {
            width: 26rem;
            margin: auto;
            margin-top: 15rem;
            height: 19rem;
            padding: 0.3rem;
            border-radius: 13px;
            color: white;
            background-color: green;
            position: relative;
        }

        .welcome-heading {
            width: 100%;
            text-align: center;
        }

        ol {
            color: black !important;
            margin-top: 2rem !important;
        }

        button {
            position: relative;
            width: 10rem;
            outline: none;
            border: none;
            background: #648d64;
            cursor: pointer;
            color: black;
            font-weight: bolder;
            position: absolute;
            right: 0;
        }
    </style>
    <?php
    include "./navbar.php";
    ?>


    <div class="modal-log-details">

        <h4 class="welcome-heading">WELCOME&nbsp;<?php
                                                    echo strtoupper($name);
                                                    ?></h4>

        <div class="welcome-body">
            Your Username is: &nbsp;<b><?php
                                        echo strtoupper($uname);
                                        ?></b>
        </div>
        <div class="instruction">
            <ol>
                <li> <b>step1:</b>Go to Login Page and enter your email/username</li>
                <li><b>step2:</b>'click' Genarate Otp</li>
                <li><b>step3:</b>check your email inbox you got a otp</li>
                <li><b>step4:</b>Enter Otp and click login</li>
                <li><b>step5:</b>Fill Your right details and submit </li>
            </ol>
        </div>
        <button onclick="window.location.href='./login.php?newuser'" href=''>Login</button>
    </div>
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
</body>

</html>