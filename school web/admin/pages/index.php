<?php
// $domain = "localhost/karim";

include "../assets/connection.php";

session_start();
$login = $_SESSION['login'];
$password = $_SESSION['password'];
$email = $_SESSION['email'];
$path = $_SESSION['path'];

$_SESSION['logged_in'] = true;
echo getcwd();
// $_SESSION['subject_name'];
if ($login != true && $password != true) {
    header("location:../../pages/login.php");
} elseif ($login == true && $password == true) {
    $rand = rand(10000, 19999);
    $sql = "UPDATE `admins` SET `OTP`='$rand',`last_log`=CURRENT_TIMESTAMP() WHERE `admins`.`email`='$email'";
    $result = mysqli_query($connection, $sql);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../assets/admin.css">
    <link rel="stylesheet" href="http://localhost/karim/school web/assets/universal.css">
    <link rel="stylesheet" href="http://localhost/karim/school web/assets/phone.css">
</head>

<body>

    <div id="loading">
        <svg>
            <use href="http://localhost/karim/school web/svg_logos/svg_icons.svg#loading"></use>
        </svg>
    </div>
    <section class="admin-body">
        <div class="admin-left">
            <div class="site-name">
                <p>JHM</p>
                <img src="https://tse4.mm.bing.net/th?id=OIP.dkG0ervqYt4ox2XJluo48wHaHa&pid=Api&P=0" alt="logo" class="site-logo">


            </div>
            <div class="side-bar">

                <ul>

                    <li><a href='?query=dashboard'>
                            <span><svg class='side-svg-icon'>
                                    <use href='http://localhost/karim/school web/svg_logos/svg_icons.svg#dashboard'></use>
                                </svg></span><span class='menu-name'>Dashboard</span></a>
                    </li>
                    <li class="submanu-parent"><a href='#'>
                            <span><svg class='side-svg-icon'>
                                    <use href='http://localhost/karim/school web/svg_logos/svg_icons.svg#list'></use>
                                </svg></span><span class='menu-name'><span>Students</span><svg class='side-svg-icon'>
                                    <use href='http://localhost/karim/school web/svg_logos/svg_icons.svg#angle_down'></use>
                                </svg></span></a>
                        <ul class="submanu-ul">
                            <li class="sub-manu"><a href="?query=studentresult"><span><svg>
                                            <use href='http://localhost/karim/school web/svg_logos/svg_icons.svg#certificate'></use>
                                        </svg></span><span> Student Result</span></a>
                            </li>
                            <li class="sub-manu"><a href="?query=studentlist"><span><svg>
                                            <use href='http://localhost/karim/school web/svg_logos/svg_icons.svg#list'></use>
                                        </svg></span><span> Student List</span></a>
                            </li>
                            <li class="sub-manu"><a href="?query=addstudent"><span><svg>
                                            <use href='http://localhost/karim/school web/svg_logos/svg_icons.svg#plus'></use>
                                        </svg></span><span>Add Student</span></a>
                            </li>



                        </ul>
                    </li>
                    <li class="submanu-parent"><a href='#'>
                            <span><svg class='side-svg-icon'>
                                    <use href='http://localhost/karim/school web/svg_logos/svg_icons.svg#list'></use>
                                </svg></span><span class='menu-name'><span>Staff</span><svg class='side-svg-icon'>
                                    <use href='http://localhost/karim/school web/svg_logos/svg_icons.svg#angle_down'></use>
                                </svg></span></a>

                        <ul class="submanu-ul">
                            <li class="sub-manu"><a href="?query=stafflist"><span><svg>
                                            <use href='http://localhost/karim/school web/svg_logos/svg_icons.svg#list'></use>
                                        </svg></span><span> Staff List</span></a>
                            </li>
                            <li class="sub-manu"><a href="?query=addstaff"><span><svg>
                                            <use href='http://localhost/karim/school web/svg_logos/svg_icons.svg#plus'></use>
                                        </svg></span><span>Add Staff</span></a>
                            </li>
                        </ul>
                    </li>


                    <li class="submanu-parent"><a href='#'>
                            <span><svg class='side-svg-icon'>
                                    <use href='http://localhost/karim/school web/svg_logos/svg_icons.svg#setting'></use>
                                </svg></span><span class='menu-name'><span>Setting</span><svg class='side-svg-icon'>
                                    <use href='http://localhost/karim/school web/svg_logos/svg_icons.svg#angle_down'></use>
                                </svg></span></a>

                        <ul class="submanu-ul">
                            <li class="sub-manu"><a href="?query=announcement"><span><svg>
                                            <use href='http://localhost/karim/school web/svg_logos/svg_icons.svg#horn'></use>
                                        </svg></span><span>New Announcement</span></a>
                            </li>
                            <li class="sub-manu"><a href="?query=logochange"><span><svg>
                                            <use href='http://localhost/karim/school web/svg_logos/svg_icons.svg#plus'></use>
                                        </svg></span><span>Logo Change</span></a>
                            </li>
                            <li class="sub-manu"><a href="?query=pages"><span><svg>
                                            <use href='http://localhost/karim/school web/svg_logos/svg_icons.svg#page'></use>
                                        </svg></span><span>Pages Status</span></a>
                            </li>
                            <li class="sub-manu"><a href="?query=subjectadd"><span><svg>
                                            <use href='http://localhost/karim/school web/svg_logos/svg_icons.svg#plus'></use>
                                        </svg></span><span>Add Subjects</span></a>
                            </li>
                            <li class="sub-manu"><a href="?query=setting"><span><svg>
                                            <use href='http://localhost/karim/school web/svg_logos/svg_icons.svg#setting'></use>
                                        </svg></span><span>Setting</span></a>
                            </li>
                        </ul>
                    </li>













                    <li class="logout"><a href='../pages/logout.php'><span><svg class='side-svg-icon'>
                                    <use href='http://localhost/karim/school web/svg_logos/svg_icons.svg#logout'></use>
                                </svg></span>
                            <span class="menu-name">Logout</span>
                        </a></li>
                </ul>
            </div>
        </div>




        <div class="admin-right">
            <div class="manu-bar">
                <div class="hambargar">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

                <div class="profile">
                    <img src="https://tse2.mm.bing.net/th?id=OIP.88hQwxL9ILYl7PV_HXgWqgHaE8&pid=Api&P=0" alt="profile-pic" class="profile-image">
                    <div class="profile-info">
                        <p class="username">Admin</p>
                        <p class="id">JHMSTAD2023</p>
                    </div>
                </div>
            </div>
            <div id="status-alert"></div>
            <?php
            if (isset($_GET['query'])) {
                $query = $_GET['query'];

                if ($query == "dashboard") {
                    echo '<div class="dashboard">
                                            <div class="cards">
                                                <div class="counter-cards">
                                                    <div class="counter-card-data">
                                                        <span data="2300">2300</span>
                                                        <p>Total Students</p>
                                                    </div>
                                                    <svg class="counter-svg-icon">
                                                        <use href="http://localhost/karim/school web/svg_logos/svg_icons.svg#Student List"></use>
                                                    </svg>
                                                </div>
                                                <div class="counter-cards">
                                                    <div class="counter-card-data">
                                                        <span data="120">120</span>
                                                        <p>New Applicant</p>
                                                    </div>
                                                    <svg class="counter-svg-icon">
                                                        <use href="http://localhost/karim/school web/svg_logos/svg_icons.svg#Student List"></use>
                                                    </svg>
                                                </div>
                                                <div class="counter-cards">
                                                    <div class="counter-card-data">
                                                        <span data="100">100</span>
                                                        <p>Pending Payment</p>
                                                    </div>
                                                    <svg class="counter-svg-icon">
                                                        <use href="http://localhost/karim/school web/svg_logos/svg_icons.svg#rupee"></use>
                                                    </svg>
                                                </div>
                                                <div class="counter-cards">
                                                    <div class="counter-card-data">
                                                        <span data="12">12</span>
                                                        <p>Payment Fail/Pending</p>
                                                    </div>
                                                    <svg class="counter-svg-icon">
                                                        <use href="http://localhost/karim/school web/svg_logos/svg_icons.svg#rupee"></use>
                                                    </svg>
                                                </div>
                                            </div>
                                        
                                            <div class="recent">
                                                <div class="recent-head">
                                                    <h4 class="recent-head">Some Recent Transesion</h4>
                                                    <a href="#">Show More</a>
                                                </div>
                                                <table id="dataTable">
                                                    <thead>
                                                        <tr>
                                                            <th>Sl No</th>
                                                            <th>Student Id</th>
                                                            <th>Name</th>
                                                            <th>Contact No</th>
                                                            <th>Payment Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>JHM20230202</td>
                                                            <td>Md Rejuwanul Karim</td>
                                                            <td>7478919026</td>
                                                            <td>Success</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        ';
                } elseif ($query == "studentresult") {
                    echo '
                                                <div class="classes">';
                    $sql = "SELECT * FROM `staffs`";
                    $result = mysqli_query($connection, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $tname = $row['name'];
                            $sub_name = str_replace("_", "&nbsp;", $row['subject']);
                            $request = strtolower($row['subject']);

                            echo "<div class='card-class'>
                                                                <h1 class='subject-name'>&nbsp;$sub_name</h1>
                                                                <p class='teacher-name'><b>Teacher's Name</b>:&nbsp;$tname</p>
                                                                <button class='enter-btn' type='submit'><a href='../staffs/index.php?subject=$request'>Enter</a></button>
                                                            </div>";
                        }
                    }

                    echo "</div>";
                } elseif ($query == "studentlist") {
                    echo "<div class='student-list'>
                                                                <div class='serches'>
                                                                    <form class='flex-row-reverse'>
                                                            
                                                                        <input type='text' name='student-id' placeholder='Enter student id' maxlength='20' class='search-input'>
                                                                        <input type='button' value='Search'>
                                                                    </form>
                                                                </div>
                                                                <div class='second-serches'>
                                                                    <form class='flex-row search-form' action='./index.php'>
                                                            
                                                                        <div class='flex-row'>
                                                                            <label for='Class'>Class:&nbsp;</label>
                                                                            <select name='class' onchange='short_class(this.value)' id='class' class='search-select'>";

                    $sql = "SELECT * FROM `class`";
                    $result = mysqli_query($connection, $sql);
                    while ($row = mysqli_fetch_row($result)) {
                        $class = $row[1];
                        if ($class != "") {
                            $val = explode(" ", $class);
                            echo "<option value='$val[1]'  for='$class'>$class</option>";
                        }
                    }

                    echo "</select>

                                                                        </div>
                                                                        <div class='flex-row'>
                                                                            <label for='Sec'>Section:&nbsp;</label>
                                                                            <select onchange='short_sec(this.value)' name='section' id='section' class='search-select'>";


                    $sql = "SELECT * FROM class";
                    $result = mysqli_query($connection, $sql);
                    while ($row = mysqli_fetch_row($result)) {
                        $section = $row[2];

                        echo $section . "<br>";
                        if ($section != "") {
                            $val = explode(" ", $section);
                            echo "<option value='$val[1]' for='$val[1]'>$section</option>";
                        }
                    }


                    echo "</select>

                                                                                </div>

                                                                            <div class='flex-row'>
                                                                                <label for='Sec'>Year:&nbsp;</label>
                                                                                <!-- <select name='section' id='class' class='search-select'> -->
                                                                                <input type='date' name='date' id='year' onchange='search_year(this.value)'>
                                                                                <!-- </select> -->

                                                                                </div>
                                                                                <input type='button' onclick='search_all()' value='Search' id='search-btn'>


                                                                            </form>
                                                                            </div>
                                                                            <div class='student-table'>
                                                                                <h4 class='table-heding student-heading'><span>Search Results</span><button onclick='student_print()'>Print</button></h4>
                                                                                <table class='data-table' onload='studentlist()'>
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Slno</th>
                                                                                            <th>ID</th>
                                                                                            <th>Profile Photo</th>
                                                                                            <th>Name</th>
                                                                                            <th>Class</th>
                                                                                            <th>Section</th>
                                                                                            <th>Roll NO</th>
                                                                                            <th>Father's Name</th>
                                                                                            <th>Phone No</th>
                                                                                            <th>Address</th>
                                                                                            <th class='action-heading'>Action</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody id='student-table-body'>



                                                                                    </tbody>
                                                                                </table>
                                                                            </div>


                                                                            <div class='modal-effect' id='editModal'>
                                                                            <form class='edit-modal' id='update-modal'>
                                                                            <div class='flex-row edit-hide-sec'><span onclick='modal_hide()' id='update-modal-hidener'>&times;</span></div>
                                                                            <h3>Update Details</h3>

                                                                            <div class='flex-row w-100' id='modal-form'>
                                                                            <label for='name'>Name:&nbsp;</label>
                                                                            <input type='text' name='student-name'  id='student-name'>
                                                                            </div>
                                                                            <div class='flex-row w-100'>
                                                                            <label for='fname'>Father's Name:&nbsp;</label>
                                                                            <input type='text' name='father-name' id='father-name'>
                                                                            </div>
                                                                            <div class='flex-row w-100'>
                                                                            <label for='class'>Class:&nbsp;</label>
                                                                            <input type='text' name='class' id='edt-class'>
                                                                            </div>
                                                                            <div class='flex-row w-100'>
                                                                            <label for='roll'>Roll No:&nbsp;</label>
                                                                            <input type='number' name='roll' id='edt-roll'>
                                                                            </div>
                                                                            <div class='flex-row w-100'>
                                                                            <label for='sec'>Section:&nbsp;</label>
                                                                            <input type='text' name='section' id='edt-section'>
                                                                            </div>
                                                                            <div class='flex-row w-100'>
                                                                            <label for='phone'>Phone No:&nbsp;</label>
                                                                            <input type='number' name='phone' id='edt-phone'>
                                                                            </div>
                                                                            <div class='flex-row w-100'>
                                                                            <label for='address'>Address:&nbsp;</label>
                                                                            <input type='text' name='address' id='edt-address'>
                                                                            </div>

                                                                            <button type='submit' class='w-100 update-btn' id='update-btn'>Update</button>
                                                                                </form>

                                                                            </div>




                                                                            </div>


                                                                            ";
                } elseif ($query == "addstudent") {
                    echo 'student add';
                } elseif ($query == "stafflist") {
                    echo " <body onload='stafflist()'></body>
                                        <h4 class='table-heding student-heading'><span>Search Results</span><button onclick='student_print()'>Print</button></h4>
                                                <div class='student-table'>                                                   
                                        <table class='data-table' onload='stafflist(this.id)'>
                                        <thead>
                                            <tr>
                                                <th>Slno</th>
                                                <th>Profile Photo</th>
                                                <th>Name</th>
                                                <th>Subject</th>
                                                <th>Email</th>
                                                <th>Phone No</th>
                                                <th>Address</th>
                                                <th>Joining Date</th>
                                                <th class='action-heading'>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id='staff-table-body'>



                                        </tbody>
                                                    </table>

                                                </div>


                                        <div class='modal-effect' id='staff-editModal'>
                                        <form class='edit-modal' id='update-modal'>
                                        <div class='flex-row edit-hide-sec'><span onclick='admin_modal_hidener(this)' id='update-modal-hidener'>&times;</span></div>
                                        <h3>Update Details</h3>

                                        <div class='flex-row w-100' id='modal-form'>
                                        <label for='name'>Name:&nbsp;</label>
                                        <input type='text' name='staff-name'  id='staff-name'>
                                        </div>
                                        
                                        <div class='flex-row w-100'>
                                        <label for='Subject'>Subject:&nbsp;</label>
                                        <input type='text' name='subject' id='edt-subject'>
                                        </div>

                                        <div class='flex-row w-100'>
                                        <label for='phone'>Phone No:&nbsp;</label>
                                        <input type='number' name='phone' id='edt-phone'>
                                        </div>

                                        <div class='flex-row w-100'>
                                        <label for='email'>Email:&nbsp;</label>
                                        <input type='email' name='phone' id='edt-email'>
                                        </div>

                                        <div class='flex-row w-100'>
                                        <label for='address'>Address:&nbsp;</label>
                                        <input type='text' name='address' id='edt-address'>
                                        </div>
                                        <div class='flex-row w-100'>
                                        <label for='joining'>Joining Date:&nbsp;</label>
                                        <input type='text' name='joiningdate' id='edt-joiningdate'>
                                        </div>

                                        <button type='submit' class='w-100 update-btn' id='update-btn'>Update</button>
                                            </form>

                                        </div>




                                        </div>


                                                ";
                } elseif ($query == "addstaff") {
                    echo "add staff";
                } elseif ($query == "announcement") {
                    echo "notice";
                } elseif ($query == "logochange") {
                    echo "logo";
                } elseif ($query == "pages") {
                    echo "pages";
                } elseif ($query == "subjectadd") {
                    echo "add subject";
                }
            }





            ?>




        </div>
    </section>
    <div class="profile-modal">
        <table>
            <thead>
                <th>Profile Picture</th>
                <th>Name</th>
                <th>Class</th>
                <th>Sec</th>
                <th>Roll</th>
                <th>Father's Name</th>
                <th>Mobile No</th>
                <th>Email</th>
                <th>Address</th>
            </thead>
            <tbody>
                <tr>
                    <td><img src="../../_images/students_photograph/JHM20220202121.png" alt="Student Profile" class="table-profile-photo"></td>
                    <td>Karim</td>
                    <td>V</td>
                    <td>A</td>
                    <td>55</td>
                    <td>Khairul Islam</td>
                    <td>8388987612</td>
                    <td>karimdr341@gmail.com</td>
                    <td>jagannathpur,H.C.pur,Malda,732125</td>
                </tr>
            </tbody>
        </table>
        <h4 class="form-heading" style="border-bottom: 2px solid white;margin-top: 2rem;padding: 0.5rem;">1st Term Result&nbsp;::</h4>

        <table>

            <tbody>
                <tr>
                    <?php
                    $sql = "SELECT * FROM `subjects`";
                    $result = mysqli_query($connection, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $subject = $row['subject'];
                        echo "<td>$subject</td>";
                    }
                    ?>

                </tr>

            </tbody>
        </table>
    </div>

    <script src="../assets/admin.js"></script>
</body>

</html>