<?php
$insert = false;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = 'userinfo';
$db2 = 'commentdb';
$db3 = 'usertable';
// $con = mysqli_connect($servername, $username, $password, $dbname);
$con = mysqli_connect($servername, $username, $password, $dbname);
$con2 = mysqli_connect($servername, $username, $password,$db2);
$dbname2 = 'usertable';
$con3 = mysqli_connect($servername, $username, $password, $dbname2);



// if (!$con) {
//     die("connection is not stable" . mysqli_connect_error());
// } else {
//     echo " connection is successfully";
// }

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header('location: ../login/login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $gmail = $_POST['email'];
    $phoneno = $_POST['phoneno'];
    $comment = $_POST['comment_box'];
    // if ($result) {
    //     $insert = true;
    // } else {
    //     echo "connection unsuccess" . mysqli_error($con);
    // }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<link rel="stylesheet" href="nav_bar.css">
<link rel="stylesheet" href="../homepage/footer.css">
<link rel="stylesheet" href="./admin.css">
<link rel="stylesheet" href="./style.css">


<body>
    <header>
       
        <?php
// if (isset($_GET['admin'])) {
//     $addm = $_GET['admin'];
//     echo 'well come '.$addm;
// }
// else{
//     header('location: ../login/login.php');
// }

     ?>
  
            <div id="logo"><a href="#logo">
                    <img src="../homepage/CODER FREE.png" alt="logo Here">
                    <p id="webname" style="color:#3b3732">
                        <b>FREE COURSE</b>
                    </p>
                </a>
            </div>
            <div id="nav">
                <ul class="nav_item">
                    <li class="nav"><a href="../homepage/karim.php">Home</a></li>
                    <li class="nav"><a href="/course">Course</a></li>
                    <li class="nav"><a href="/about">About</a></li>
                    <li class="nav"><a href="/contact">Contac us</a></li>
                    <li class="nav">
                        <div class="btn">
                            <!-- <button class="login"> Login</button> -->
                            <a href="../login/logout.php?eid"><input type="button" value="logout" class="login"></a>
                                                </div>

                    </li>
                </ul>
            </div>
        </div>
        </div>
        <!-- <div id="nav">
            <h1 style="text-align:center;">Only Admin View</h1>
            <a href="../login/logout.php">logout</a>
        </div> -->

    </header>
    <hr>
    <div id="users-admin-table">
        <h3 style="text-align:center;position:sticky;">Users Details</h3>
    <table>
        <tr>
            <th>sl. no</th>
            <th>name</th>
            <th>gmail</th>
            <th>Password</th>
            <th>Date&Time</th>
            <th>Action</th>
        </tr>
        <?php
        $sql = "SELECT * FROM `users`";
        $result = mysqli_query($con, $sql);
        //   $year=date("Y");
        $sno = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $sno = $sno + 1;
            $dbslno = $row['slno'];
            echo "<tr>
      <td scope='col'>" . $sno  . "</td>
      <td scope='col'>" . $row['name']  . "</td>
      <td scope='col'>" . $row['username'] . "</td>
      <td scope='col'>" . $row['password'] . "</td>
      <td scope='col'>" . $row['date'] . "</td>
      <td scope='col'>" . "<button id='delBtn' onClick=funcDel('$dbslno')>Delet</button>" . "</td>
      </tr>";
        }
        ?>


    </table>
    </div>
    
    <div id="user-comment-table">
        <h3 style="text-align:center;position:sticky;">Comment Bata Base</h3>
    <table>
        <tr>
            <th>sl. no</th>
            <th>name</th>
            <th>gmail</th>
            <th>phoneno</th>
            <th>comment</th>
            <th>Date&Time</th>
            <th>Action</th>
        </tr>

        <?php
        $sql2 = "SELECT * FROM `commentform`";
        $result = mysqli_query($con2, $sql2);
        //   $year=date("Y");
        $slno = 0;
        while ($row2 = mysqli_fetch_assoc($result)) {
            $slno = $slno + 1;
            $dbslno = $row2['slno'];
            echo "<tr>
      <td scope='col'>" . $slno  . "</td>
      <td scope='col'>" . $row2['name']  . "</td>
      <td scope='col'>" . $row2['gmail']  . "</td>
      <td scope='col'>" . $row2['phoneno'] . "</td>
      <td scope='col'>" . $row2['comment'] . "</td>
      <td scope='col'>" . $row2['date'] . "</td>
      <td scope='col'>" . "<button id='comment-delBtn' onClick=commentDel('$dbslno')>Delet</button>" . "</td>
      </tr>";
        }
        ?>
    </table>
    <br><br>
    </div>
    <hr>
<br><br>
    <footer>
        <p id="footer_para">Copyright <?php
                                        $year = date("Y");
                                        echo $year;
                                        ?> &copy; from free course.com </p>
    </footer>

    <!-- delete operation -->
    <?php
    //todo -> create a session to get hacked
    if (isset($_GET)) {
        $sln = $_GET['del'];
        $sql = "DELETE FROM `users` WHERE `users`.`slno` = $sln";
        $result = mysqli_query($con, $sql);
    }
    
    ?>
    
    
    <script>
        const funcDel = (sln) => {
            console.log("Working...");
            if (confirm("Are you sure?")) {
            window.location = `/karim/won/homepage/admin.php?del=${sln}`
            location.reload();
            } else {
                console.log("ok not gonna delete");
            }
        }
    </script>

    
    <?php
    //todo -> create a session to get hacked
    if (isset($_GET)) {
        $slno = $_GET['commentdel'];
        $sql = "DELETE FROM `commentform` WHERE `commentform`.`slno` = $slno";
        $result = mysqli_query($con2, $sql);
    }
    
    ?>
    
    
    <script>
        const commentDel = (slno) => {
            console.log("Working...");
            // if (confirm("Are you sure?")) {
            window.location = `/karim/won/homepage/admin.php?commentdel=${slno}`
            location.reload();
        //     } else {
        //         console.log("ok not gonna delete");
        //     }
        }
    </script>
</body>
</html>