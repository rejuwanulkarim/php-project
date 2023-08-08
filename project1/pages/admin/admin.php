<?php


use LDAP\Result;

session_start();
include "./dbconnect.php";
global $connection;
global $rout;
$rout = false;
global $login_alert;
global $admin_gmail;
global $deleted;
$deleted = false;
global $admin_insert;
$admin_insert = false;

if ($_SESSION['login'] != true || $_SESSION != true || $_SESSION['login'] == false) {
    header('location: ./login.php');
}



global $username;
$username = $_SESSION['username'];
global $slno;
$slno = $_SESSION['slno'];
global $admin_power;
$admin_power = $_SESSION['admin_power'];

$user_sql = "SELECT * FROM `user` WHERE username='$username'";
$result = mysqli_query($connection, $user_sql);
while ($data = mysqli_fetch_assoc($result)) {
    $admin_power = $data['admin_power'];
    $user_slno = $data['slno'];
    $username = $data['name'];
    $admin_gmail = $data['gmail'];
    $login_alert = $data['alert'];
}

if ($login_alert == 0 || $login_alert == false) {
    function smtp_mailer($sub, $msg, $admin_gmail)
    {
        try {
            include('../credentials/smtp/PHPMailerAutoload.php');
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 587;
            $mail->SMTPSecure = "tls";
            $mail->SMTPAuth = true;
            $mail->Username = "bekreta2022@gmail.com";
            $mail->Password = "ojevcixgtjijvhok";
            $mail->SetFrom("bekreta2022@gmail.com");
            $mail->addAddress("$admin_gmail");
            $mail->IsHTML(true);
            $mail->Subject = "$sub";
            $mail->Body = $msg;
            $mail->SMTPOptions = array('ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => false
            ));
            // if()
            $mail->send();
        } catch (Exception $e) {
            echo "mail is not send";
        }
    }
    $message = '
   
    <div class="sms_section" style="    background: #261e1e;
padding-left:0.3rem;
padding-right:0.3rem;
 border: 2px solid gray;
 color: gray;">
 <p class="sms_heading"  style="    font-size: 2rem;
 width: 100%;
 font-weight: bolder;
 color: blue;
 ">Bekreta</p>
 
 <p style="font-size:1rem;">Hi ' . $username . ',</p>
 <p style="font-size:1rem;">We have recently detected a login with a new device to your<a href="Bekreta.com"> Bekreta</a> Account.</p>
 <br><br>
 <p style="font-size:1rem;">IP Address: ' . getenv("REMOTE_ADDR") . '</p>
 <br>
 <p style="font-size:0.5rem;width:100%;text-align:center;">If you don\'t recognize this event,please change your password and enable 2-factor authentication to make your account secure.</p>
 </div>
';
    smtp_mailer('Alert', $message, $admin_gmail);
    $sql = "UPDATE `user` SET `alert` = '1' , `status`='true ' WHERE `user`.`slno` = $slno";
    $result = mysqli_query($connection, $sql);
}

if ((time() -  $_SESSION['session_time']) > 86400) {
    header('location:./logout.php');
}
function admin_list()
{
    include "./dbconnect.php";
    echo "
<table class='data_tabel' id='myTable'>
    <thead class='data_table_head'>
        <tr class='data_table_head_tr'>
            <th class='data_table_head_th'>Sl No.</th>
            <th class='data_table_head_th'>Db Sl No.</th>
            <th class='data_table_head_th'>Name</th>
            <th class='data_table_head_th'>Username</th>
            <th class='data_table_head_th'>Phone No</th>
            <th class='data_table_head_th'>Gmail</th>
            <th class='data_table_head_th'>Admin Power</th>
            <th class='data_table_head_th'>Cause of Admin</th>
            <th class='data_table_head_th'>Status</th>
            <th class='data_table_head_th'>Action</th>

        </tr>
    </thead>
     <tbody>";
    $slno = $_SESSION['slno'];
    $sql = "SELECT * FROM `user`";
    $result = mysqli_query($connection, $sql);
    // echo "$user_slno";

    $list_slno = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $db_slno = $row['slno'];
        $db_name = $row['name'];
        $db_username = $row['username'];
        $db_phoneno = $row['phoneno'];
        $db_gmail = $row['gmail'];
        $db_admin_power = $row['admin_power'];
        $db_cause = $row['cause'];
        $db_status = $row['status'];
        $status = filter_var($db_status, FILTER_VALIDATE_BOOLEAN);
        if ($status == true) {
            $idstatus = 'Online';
            $active_class = 'green';
        } elseif ($status == false) {
            $idstatus = 'Offline';
            $active_class = 'red';
        }
        echo "
<tr class='data_table_head_tr'>
      <td class='data_table_head_th'>" . $list_slno++ . "</td>
      <td class='data_table_head_th'>$db_slno</td>
      <td class='data_table_head_th'>$db_name</td>
      <td class='data_table_head_th'>$db_username</td>
      <td class='data_table_head_th'>$db_phoneno</td>
      <td class='data_table_head_th'>$db_gmail</td>
      <td class='data_table_head_th'>$db_admin_power</td>
      <td class='data_table_head_th'>$db_cause</td>
      <td class='data_table_head_th $active_class'>$idstatus</td>
      <td class='data_table_head_th action_buttons'>
      
      <a href='admin.php?delete=$db_slno' id='delete_btn_i' class='delete_btn_c'>
      <svg xmlns='' class='svg_icone delete_icone' viewBox='0 0 448 512'><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d='M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z'/></svg>
      </a>
      <span class='delete_hover_span'>Delete</span>
      
      <a href='?edit_data=$db_slno' id='edit_btn' class='edit_btn_c'>
      <svg xmlns=''  class='svg_icone edit_icone' viewBox='0 0 512 512'><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d='M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.8 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z'/></svg>
      </a>
      <span class='edit_hover_span'>Edit</span>
      </td>
      
  </tr>
";
    }
    echo "</tbody>
</table>
";
}
function admin_create()
{
    include './dbconnect.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['sub_admin_name'];
        $username = $_POST['sub_admin_username'];
        $email = $_POST['sub_admin_email'];
        $phone_no = $_POST['sub_admin_phone'];
        $reason = $_POST['sub_admin_causes'];
        $password = $_POST['sub_admin_password'];
        $cpassword = $_POST['sub_admin_cpassword'];
        $hashpassword = password_hash("$password", PASSWORD_DEFAULT);

        $sql = "SELECT * FROM `user` WHERE `user`.`gmail`='$email'";
        $result = mysqli_query($connection, $sql);

        if ($password == $cpassword) {
            if (mysqli_num_rows($result) > 0) {
                $userexist = true;
            } else {
                $sql = "INSERT INTO `user` (`slno`, `name`, `phoneno`, `gmail`, `username`, `password`, `cause`, `admin_power`, `otp`, `alert`,`status`) VALUES (NULL, '$name', '$phone_no', '$email', '$username', '$hashpassword', '$reason', '0', '1', '1','false')";
                $result = mysqli_query($connection, $sql);
                if ($result) {
                    echo "<div id='insert_alert'>
                <div class='insert_inner_text'>
                    <div class='inner_text'><b>Success!</b>Admin Created</div>
                    <span id='insert_hidener'>&times;</span>
                </div>
                </div>";
                } else {
                    echo "<div id='insert_alert'>
                    <div class='insert_inner_text'>
                        <div class='inner_text'><b>Error!</b>Admin not Created</div>
                        <span id='insert_hidener'>&times;</span>
                    </div>
                    </div>";
                }
            }
        } else {
            $password_not_match = true;
        }
    }
    echo "
    <section class='admin_create_page'>
        <div class='head_create_admin'>
            <p>Create Your Admin</p>
            <p class='admin_exist'><a href='#'>Super Admin&nbsp;<i class='fa-solid fa-arrow-right'></i></a></p>
        </div>
        <div class='creater_div'>
            <p style='color:red;'>(please fill all inputs)</p>
            <form action='admin.php?admin_insert' method='POST' class='admin_create_form'>
                <div class='admin_input_lable'>
                    <!-- <label for='Admin Name'>Name Of Sub-admin <i class='important'>*</i>: </label> -->
                    <input type='text' name='sub_admin_name' class='admin_create_inputs' maxlength='50' required placeholder='Name Of Sub-admin(0-40) '>
                    
                    <input type='text' name='sub_admin_username' class='admin_create_inputs' maxlength='30' required placeholder='Sub admin Username(0-25)'>
                    <!-- <label for='Admin Email'>Email Of Sub-admin <i class='important'>*</i>: </label> -->
                    <input type='email' name='sub_admin_email' class='admin_create_inputs' maxlength='40' required placeholder='Email Of Sub-admin(0-30)'>
    
                    <!-- <label for='Admin PhoneNo'>Phone Of Sub-admin <i class='important'>*</i>: </label> -->
                    <input type='number' name='sub_admin_phone' class='admin_create_inputs' maxlength='14' required placeholder='Phone Of Sub-admin(0-10or12)'>
                   
                    <input type='text' name='sub_admin_causes' class='admin_create_inputs' maxlength='80' required placeholder='Why Create SubAdmin(0-70)'>
    
                    <input type='password' name='sub_admin_password' class='admin_create_inputs password' id='password1' maxlength='80' required placeholder='Create a Password(0-70)'>
    
    
                    <input type='password' name='sub_admin_cpassword' class='admin_create_inputs password' id='password2' maxlength='80' required placeholder='Confirm Password(0-70)'>
    
    
                    <div id='password_viewer'>
                        <i class='fa-solid fa-eye-slash' id='Password_viewer_icon'></i>&nbsp; <p class='Password_viewer_para'>show Password</p>
                    </div>
    
                </div>
               
   
                <input type='submit' class='submit_btn'>
                
            </form>
        </div>
    </section>";
}

function product_insert()
{
    include './dbconnect.php';
    global $product_insert_alert;
    $product_insert_alert = false;
    global $product_insert;
    $product_insert = true;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $site_name = $_POST['site_name'];
        $site_url = $_POST['site_url'];
        $product_type = $_POST['product_type'];
        if ($site_name == null || $site_name == "" || $site_url == null || $site_url == "") {
            echo "Please Fill all Input";
        } else {
            $sql = "INSERT INTO `product` (`producttype`,`sitename`,`productlink`) VALUES ('$product_type','$site_name','$site_url')";
            $result = mysqli_query($connection, $sql);
            if ($result) {
                $product_insert_alert = true;
            } else {
                $product_insert_alert = false;
                $product_insert = false;
            }
        }
    }


    echo "
    <link rel='stylesheet' href='./iframe/iframe.css'>
    <section class='admin_create_page'>
    <div class='head_create_admin'>
        <p>Add New Product</p>
    </div>
    <div class='creater_div'>
        <p style='color:red;'>(product url and site name is require)</p>
        <form action='admin.php?product_insert' method='POST' class='product_list_form'>
            <div class='sitename_div'>
                <label for='site_name' class='product_add_form_lable'>E-Commers Site Name: </label>
                <input type='text' name='site_name' placeholder='Enter site Name' class='site_name add_product_input' required>
            </div>
            <div class='sitename_div'>
                <label for='product_type' class='product_add_form_lable'>Product Type: </label>
                <input type='text' name='product_type' placeholder='Enter product type' class='site_name add_product_input' required>
            </div>
            <div class='sitename_div'>
                <label for='product_url' class='product_add_form_lable'>Product Url: </label>
                <input type='text' name='site_url' placeholder='Enter Product Url' class='product_url add_product_input' required>
            </div>
    
            <input type='submit' class='submit_btn'>
        </form>
    </div>
    ";

    if ($product_insert_alert == true) {
        echo "
        <div class='product_insert_sucess_slider'>
            <div class='product_success_body'>
                <div class='success_para'> Success! Product Details Updated</div>
        
                <span id='slider_hide_btn'>&times;</span>
            </div>
        </div>";
    } elseif ($product_insert == false &&  $product_insert_alert == false) {
        echo "  <div class='product_insert_sucess_slider unsuccess_slider_color' style='background-color:red;color:white;'>
            <div class='product_success_body'>
            <div class='success_para'>  Error! Product Details Can't Uploaded</div>
            <span id='slider_hide_btn'>&times;</span>
        </div>
        </div>";
    }



    echo "</section>";
}

require 'simple_html_dom.php';
function product_scrap($url, $slno)
{
    $html = file_get_html("$url");
    global $price;
    $price = $html->find('._25b18c div', 0)->innertext;
    global $title;
    $title = $html->find('.yhB1nd span', 0);
    global $details;
    $details = $html->find('._2418kt ul', 0)->innertext;
    $image_link = $html->find('._396cs4', 0)->src;
    $site = parse_url($url);
    $array = ['www.flipkart.com', 'www.amazon.com'];
    if ($site['host'] == 'www.flipkart.com' || $site['host'] == 'flipkart.com' || $site['host'] == 'flipkart') {
        $sitename = "flipkart";
    }
    // echo $title . '<br>';
    // echo $details.'<br>';
    // echo $image_link. '<br>';
    // echo $price . '<br>';
    // echo "$sitename";
    include './dbconnect.php';
    $product_update_sql = "UPDATE `product`SET `sitename`='$sitename',`producttitle`= '$title',`price`='$price',`image_url`='$image_link',`details`='$details' WHERE `product`.`slno`=$slno";
    $update_result = mysqli_query($connection, $product_update_sql);

    if ($update_result) {
        echo "  <div class='product_update_animetion_section'>
    <img class='product_anim_video' src='../../_assets/videos/success.gif'>
        <audio  autoplay>
            <source src='../../_assets/audios/success.mp3' type='audio/mp3'></source>
        </audio>
    </video>
</div>";
    }
}
function Product_update()
{

    include './dbconnect.php';

    $fetch_product_sql = "SELECT * FROM `product`";
    $result = mysqli_query($connection, $fetch_product_sql);
    while ($num = mysqli_fetch_assoc($result)) {
        // echo sizeof($num);
        $product_link = $num['productlink'];
        $slno = $num['slno'];
        product_scrap($product_link, $slno);
        // echo $product_link;
    }
}


?>




<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- <link rel="stylesheet" href="../main.css"> -->
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/iframe.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <!-- <link rel="stylesheet" type="text/css" href="/DataTables/datatables.css"> -->

    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"> -->
</head>

<body>

    <div class="heading">
        <h1>THIS PAGE ONLY FOR ADMIN</h1>
    </div>
    <section class="main_section">
        <aside class="side_manu_section">
            <div class="header">
                <img src="../../_images/credentials_images/nav_logo.jpg" alt="logo">
                <h1><?php echo $_SESSION['username']; ?></h1>
                <span class="hambarger">
                    <span class="hambarger_stick"></span>
                    <span class="hambarger_stick"></span>
                </span>
            </div>
            <div class="manu">
                <ul class="admin_manu_ul">
                    <a href="?dashboard" class="manu_bar_item_link" class="active">
                        <li class="manu_item dashboard"><i class="fa-solid fa-gauge"></i>&nbsp; Dashboard</li>
                    </a>
                    <a href="?admin_list" class="manu_bar_item_link">
                        <li class="manu_item admin_list"> <i class="fa-solid fa-screwdriver"></i>&nbsp; Exist Admin</li>
                    </a>
                    <?php
                    if ($admin_power == 1) {
                        echo '<a href="?admin_create" class="create_admin_li manu_bar_item_link">
                                    <li class="manu_item"><i class="fa-regular fa-plus"></i>&nbsp; Create Sub-Admin</li>
                                </a>';
                    } elseif ($admin_power == 0) {
                        echo '<a href="./iframe/login.php?super_admin_login" class="manu_bar_item_link">
                                          <li class="manu_item" onclick="demo()"><i class="fa-solid fa-user-lock"></i>&nbsp;Super Admin</li>
                                </a>';
                    }
                    ?>

                    <a href="?update_product" class="manu_bar_item_link">
                        <li class="manu_item"> <i class="fa-solid fa-pen-to-square"></i>&nbsp; Update Product</li>
                    </a>

                    <a href="?product_link" class="manu_bar_item_link">
                        <li class="manu_item"> <i class="fa-solid fa-pen-to-square"></i>&nbsp; List Of Product</li>
                    </a>
                    <a href="?add_product" class="manu_bar_item_link">
                        <li class="manu_item product_update"> <i class="fa-solid fa-cart-plus"></i>&ThickSpace; Add new Product</li>
                    </a>
                    <a href="./logout.php" class="manu_bar_item_link">
                        <li class="manu_item"><i class="fa-solid fa-power-off"></i> Logout</li>
                    </a>

                </ul>
            </div>
        </aside>


        <div class="containt_section">
            <!-- <iframe style="height:100%;width:100%;" class="container_iframe" id="iframe"></iframe> -->
            <?php
            if (isset($_GET['dashboard'])) {
                echo "<div style='height:100%;width:100%;'>work Dashboard</div>";
                $rout = true;
            } elseif (isset($_GET['admin_list'])) {
                admin_list();
            } elseif (isset($_GET['admin_create']) && $admin_power == 1) {
                admin_create();
            } elseif (isset($_GET['admin_insert']) && $admin_power == 1) {
                $rout = true;
                admin_create();
            } elseif (isset($_GET['delete']) && $admin_power == 1) {
                $rout = true;
                $delete_slno = $_GET['delete'];
                $sql_delete = "DELETE FROM `user` WHERE `user`.`slno` = $delete_slno";
                $result = mysqli_query($connection, $sql_delete);
                admin_list();
                $deleted = true;
            } elseif (isset($_GET['product_insert'])) {
                product_insert();
            } elseif (isset($_GET['super_admin_login'])) {
                if ($admin_power == 0) {
                    header('location:../iframe/logout.php');
                    $rout = true;
                } else {
                    $rout = false;
                }
            } elseif (isset($_GET['add_product'])) {
                product_insert();
            } elseif (isset($_GET['update_admin_query']) && $admin_power == 1) {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $phoneno = $_POST['phone_no'];
                    $username = $_POST['username'];
                    $admin_power = $_POST['admin_power'];
                    $password = $_POST['password'];
                    $status = $_POST['status'];
                    $sno = $_SESSION['update_slno'];
                    echo $status;
                    $hash_password_i = password_hash($password, PASSWORD_DEFAULT);
                    echo $hash_password_i;
                    if ($password != null || $password != "") {
                        $sql = "UPDATE `user` SET `name`='$name',`phoneno`='$phoneno',`gmail`='$email',`username`='$username',`password`='$hash_password_i',`admin_power`='$admin_power' WHERE `user`.`slno` = $sno";
                    } elseif ($status != "" || $status != null) {

                        $sql = "UPDATE `user` SET `name`='$name',`phoneno`='$phoneno',`gmail`='$email',`username`='$username',`admin_power`='$admin_power',`status`='$status' WHERE `user`.`slno` = $sno";
                    } else {
                        $sql = "UPDATE `user` SET `name`='$name',`phoneno`='$phoneno',`gmail`='$email',`username`='$username',`admin_power`='$admin_power' WHERE `user`.`slno` = $sno";
                        // echo "$name <br>$email <br>$phoneno <br>$username <br>$admin_power <br>$password";
                    }
                    $result = mysqli_query($connection, $sql);
                    if ($result) {
                        // echo "update success";
                        echo "<div id='delete_alert' style='background-color:green;'>
                <div class='delete_inner_text' style='background-color:green;'>
                    <div class='inner_text'><b>Success!</b> Data Update Sucessfully</div>
                    <span id='delete_hidener'>&times;</span>
                </div>
                </div>
                ";
                        admin_list();
                    }
                }
            } elseif (isset($_GET['product_link'])) {
                echo "product list";

                // product list 






            } elseif (isset($_GET['edit_data']) && $admin_power == 1) {
                // $rout = true;
                $sl = $_GET['edit_data'];
                $_SESSION['update_slno'] = $sl;
                admin_list();
                $sql = "SELECT * FROM `user` WHERE `slno`='$sl'";
                $result = mysqli_query($connection, $sql);
                if ($row = mysqli_num_rows($result) > 0) {
                    while ($num = mysqli_fetch_assoc($result)) {
                        $name = $num['name'];
                        $phoneno = $num['phoneno'];
                        $email = $num['gmail'];
                        $username = $num['username'];
                        $adminpower = $num['admin_power'];
                        $status = $num['status'];
                        // $name=$num['name'];
                        echo "<form action='admin.php?update_admin_query' method='POST'>
                        <section class='admin_edit_modal'>
                            <div class='admin_edit_body' class='data_edit_input'>
                    <h1 style='font-size: 2.5rem;border-bottom:2px solid black;    width: 100%;
                    text-align: center;'>Edit Data</h1>
                                <label for='name' class='data_edit_lable'>Name: </label>
                                <input type='text'  value='$name' name='name' class='data_edit_input'>
                    
                                <label for='phoneno' class='data_edit_lable'>Phone No: </label>
                                <input type='number' value='$phoneno' name='phone_no' class='data_edit_input'>
                    
                                <label for='email' class='data_edit_lable'>Email: </label>
                                <input type='text'  value='$email' name='email' class='data_edit_input'>
                    
                                <label for='adminpower' class='data_edit_lable'>Admin Power: </label>
                                <input type='text'  value='$adminpower' name='admin_power' class='data_edit_input'>
                    
                                <label for='username' class='data_edit_lable'>User Name: </label>
                                <input type='text'  value='$username' name='username' class='data_edit_input'>
                    
                                <label for='status' class='data_edit_lable'>Status: </label>
                                <input type='text'  value='$status' name='status' class='data_edit_input'>

                                <label for='password' class='data_edit_lable'>New Password: </label>
                                <input type='text'  value='' name='password' class='data_edit_input'>
                    
                                <input type='submit' value='submit' class='data_edit_btn'>
                            </div>
                    
                        </section>
                    </form>";
                    }
                }
            } elseif (isset($_GET['update_product'])) {
                Product_update();
            }





            if ($deleted == true) {
                echo "<div id='delete_alert'>
                <div class='delete_inner_text'>
                    <div class='inner_text'><b>Success!</b>Data Delete Successfully</div>
                    <span id='delete_hidener'>&times;</span>
                </div>
                </div>
              
                ";
            }

            ?>
    </section>


    <?php
    if (isset($_SESSION['success'])) {
        echo 'hello';
    }
    ?>
    <script src="https://kit.fontawesome.com/1759eb970b.js" crossorigin="anonymous"></script>
    <!-- <script src="../icon.js"></script> -->
    <script src="../scripts/admin.js"></script>
    
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  

   
      <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>