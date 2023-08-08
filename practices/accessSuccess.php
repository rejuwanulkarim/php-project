<?php
session_start();
global $admin_power;
global $nickname;
$admin_power = $_SESSION['admin_power'];
$nickname = $_SESSION['nickname'];
// echo $_SESSION['admin_power'];
echo '  <link rel="stylesheet" href="style.css">';
if ($_SESSION['login'] != true || $_SESSION['password'] != true) {
    header('location: trylogin.php');
}




$servername = "localhost";
$username = "root";
$password = "";
$dbname = "homedb";
global $connection;
$nickname = $_SESSION['nickname'];
// echo $nickname;
$connection = mysqli_connect($servername, $username, $password, $dbname);


global    $file_type_error;
$file_type_error = false;

use function PHPSTORM_META\type;

function details_loader($folder_name, $view_path = "")
{
    // $view_path=''
    if ($folder_name == 'vault') {
        $slno =  $_SESSION['slno'];
        // $up_sql = "UPDATE `all_info` SET `VaultValue` = '1' WHERE `all_info`.`slno` = $slno";
        // $up_result=mysqli_query($connection,$sql);




        echo "<div class='document_upload_section'>
        <div class='document_upload_heading'>Upload Your Documents</div>
        <form action='accessSuccess.php?vault_value' class='user_create vault_form' method='POST' enctype='multipart/form-data'>
            <div class='form_alert'>(all are mandatory)</div>
            <div class='upload_input'>
                <label for='doument_select' class='doument_select white'>Enter Vault Username : </label>
                <input type='text' class='input' name='vault_username' required>
            </div>

            <div class='upload_input'>
                <label for='doument_select' class='doument_select white'>Password : </label>
                <input type='password' class='input' name='vault_password' required>
            </div>
          
            <div class='submit'>
                <input type='submit' value='submit' class='submit_btn'>
            </div>

        </form>
    </div>

";
    } else {
        $nickname = $_SESSION['nickname'];
        if ($view_path != "" || $view_path != null) {
            global $nickname;
            // echo $nickname;
            $dir    = "$view_path/";
        } else {
            $dir    = "images/$nickname/$folder_name/";
            // echo $folder_name;
        }

        $files2 = scandir($dir, SCANDIR_SORT_DESCENDING);


        for ($i = 0; $i < sizeof($files2) - 2; $i++) {
            $download_path = "$dir/$files2[$i]";
            $fileType = explode(".", $files2[$i]);

            $file = substr($files2[$i], 0, 15) . ".";
            $filename = chunk_split($file, 15, '...');
            echo   '
             <div class="images_body">

            <div class="images">';
            if ($fileType[1] == 'mkv' || $fileType[1] == 'mp4' || $fileType[1] == 'WEBM' || $fileType[1] == 'MOV' || $fileType[1] == 'AVI' || $fileType[1] == 'AVCHD' || $fileType[1] == 'HTML5' || $fileType[1] == 'F4V') {
                echo '<video src="' . $dir . '/' . $files2[$i] . '" class="images" controls></video>
                </div>
                <div class="images_downloadbar">
                <svg class="svg_logo svg_fill_red" viewBox="0 0 384 512"><path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM64 288c0-17.7 14.3-32 32-32h96c17.7 0 32 14.3 32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V288zM300.9 397.9L256 368V304l44.9-29.9c2-1.3 4.4-2.1 6.8-2.1c6.8 0 12.3 5.5 12.3 12.3V387.7c0 6.8-5.5 12.3-12.3 12.3c-2.4 0-4.8-.7-6.8-2.1z"/></svg>';
            } elseif ($fileType[1] == 'pdf') {
                echo '<embed src="' . $dir . '/' . $files2[$i] . '" class="images" controls></video>
                </div>
                <div class="images_downloadbar">
                <svg class="svg_logo svg_fill_red" viewBox="0 0 384 512"><path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM64 224H88c30.9 0 56 25.1 56 56s-25.1 56-56 56H80v32c0 8.8-7.2 16-16 16s-16-7.2-16-16V320 240c0-8.8 7.2-16 16-16zm24 80c13.3 0 24-10.7 24-24s-10.7-24-24-24H80v48h8zm72-64c0-8.8 7.2-16 16-16h24c26.5 0 48 21.5 48 48v64c0 26.5-21.5 48-48 48H176c-8.8 0-16-7.2-16-16V240zm32 112h8c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16h-8v96zm96-128h48c8.8 0 16 7.2 16 16s-7.2 16-16 16H304v32h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H304v48c0 8.8-7.2 16-16 16s-16-7.2-16-16V304 240c0-8.8 7.2-16 16-16z"/></svg>';
            } else {
                echo ' <img src="./' . $dir . '' . $files2[$i] . '" alt="" class="images">
                </div>
                <div class="images_downloadbar">
                <svg xmlns="http://www.w3.org/2000/svg" class="svg_logo svg_fill_red" viewBox="0 0 384 512">
                <path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM128 256c0 17.7-14.3 32-32 32s-32-14.3-32-32s14.3-32 32-32s32 14.3 32 32zm88 32c5.3 0 10.2 2.6 13.2 6.9l88 128c3.4 4.9 3.7 11.3 1 16.5s-8.2 8.6-14.2 8.6H216 176 128 80c-5.8 0-11.1-3.1-13.9-8.1s-2.8-11.2 .2-16.1l48-80c2.9-4.8 8.1-7.8 13.7-7.8s10.8 2.9 13.7 7.8l12.8 21.4 48.3-70.2c3-4.3 7.9-6.9 13.2-6.9z" />
            </svg>
                ';
            }


            echo '
                <span class="image_name">:' . $filename . '</span>
<a href="' . $download_path . '" download="' . $download_path . '">
                <svg class="svg_logo pointer svg_fill_red" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zM432 456c-13.3 0   -24-10.7-24-24s10.7-24 24-24s24 10.7 24 24s-10.7 24-24 24z" />
                </svg>
                </a>
            </div>
        </div>
       ';
            // echo <br>";
        }
    }
}


if (isset($_GET['fileinfo'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


        $doc_type = $_POST['document_type'];
        $doc_name = $_POST['doc_name_input'];
        $documenttemp_name = $_FILES['document_input']['tmp_name'];
        $documentname = $_FILES['document_input']['name'];
        $file_type = explode(".", $documentname);

        // echo $file_type[1] ;
        if ($file_type[1] == 'js' || $file_type[1] == 'html' || $file_type[1] == 'css' || $file_type[1] == 'bat') {
            $file_type_error = true;
        } else {
            $upload_path = "images/$nickname/$doc_type/$doc_name .$file_type[1]";
            move_uploaded_file($documenttemp_name, $upload_path);

            echo $upload_path;
        }
    }
}







// user create form inserting

if (isset($_GET['logininfo'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $nickname = $_POST['nick_name'];
        $create_username = $_POST['create_username'];
        $create_password = $_POST['create_password'];


        $account_hash_password = password_hash($create_password, PASSWORD_DEFAULT);


        $vault_username = $_POST['vault_username'];
        $vault_password = $_POST['vault_password'];

        $vault_hash_password = password_hash($vault_password, PASSWORD_DEFAULT);
        $directry="images/$nickname";
        if (is_dir($directry)) {
            echo "exist file or folder";
        } else {
            mkdir($directry);
            mkdir("$directry/bank");
            mkdir("$directry/domacile");
            mkdir("$directry/jobs");
            mkdir("$directry/land");
            mkdir("$directry/private");
            mkdir("$directry/scolarship");
            // mkdir("$directry/");
        
            $sql = "INSERT INTO `all_info` (`slno`, `Gmail`, `Password`, `Name`, `NickName`, `LastLogin`, `LastLogout`, `VaultUName`, `VaultPassword`, `VaultStatus`, `AdminPower`, `AccountCreateDateTime`) VALUES (NULL, '$create_username', '$account_hash_password','$name', '$nickname', 'null', 'null', '$vault_username', '$vault_hash_password', 'active', '1',current_timestamp())";
            $result = mysqli_query($connection, $sql);
            echo "success";
        }
    }
}






?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section class="main">
        <div class="heading">WELLCOME<?php echo $_SESSION['nickname'];  ?></div>
        <div class="body">
            <aside class="left">
                <ul class="side_ul">
                    <li class="side_li"><svg class="svg_logo svg_fill_37784ced" viewBox="0 0 576 512">
                            <path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm80 256h64c44.2 0 80 35.8 80 80c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16c0-44.2 35.8-80 80-80zm96-96c0 35.3-28.7 64-64 64s-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64zm128-32H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                        </svg> <a href="?BankDoc" class="anchor_link">Bank Documents</a> </li>


                    <li class="side_li"> <svg class="svg_logo svg_fill_37784ced" viewBox="0 0 576 512">
                            <path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm80 256h64c44.2 0 80 35.8 80 80c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16c0-44.2 35.8-80 80-80zm96-96c0 35.3-28.7 64-64 64s-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64zm128-32H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                        </svg><a href="?Domacile" class="anchor_link">Domacile Documents</a> </li>
                    <li class="side_li"> <svg class="svg_logo svg_fill_37784ced" viewBox="0 0 576 512">
                            <path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm80 256h64c44.2 0 80 35.8 80 80c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16c0-44.2 35.8-80 80-80zm96-96c0 35.3-28.7 64-64 64s-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64zm128-32H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                        </svg><a href="?Land" class="anchor_link">Land Fill Documents</a> </li>


                    <li class="side_li"> <svg class="svg_logo svg_fill_37784ced" viewBox="0 0 576 512">
                            <path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm80 256h64c44.2 0 80 35.8 80 80c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16c0-44.2 35.8-80 80-80zm96-96c0 35.3-28.7 64-64 64s-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64zm128-32H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                        </svg><a href="?Jobdoc" class="anchor_link">Jobs Documents</a> </li>


                    <li class="side_li"><svg class="svg_logo svg_fill_37784ced" viewBox="0 0 576 512">
                            <path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm80 256h64c44.2 0 80 35.8 80 80c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16c0-44.2 35.8-80 80-80zm96-96c0 35.3-28.7 64-64 64s-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64zm128-32H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                        </svg> <a href="?Scolarship" class="anchor_link">Scolarship Documents</a> </li>

                    <li class="side_li"><svg class="svg_logo svg_fill_37784ced" viewBox="0 0 512 512">
                            <path d="M288 109.3V352c0 17.7-14.3 32-32 32s-32-14.3-32-32V109.3l-73.4 73.4c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l128-128c12.5-12.5 32.8-12.5 45.3 0l128 128c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L288 109.3zM64 352H192c0 35.3 28.7 64 64 64s64-28.7 64-64H448c35.3 0 64 28.7 64 64v32c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V416c0-35.3 28.7-64 64-64zM432 456c13.3 0 24-10.7 24-24s-10.7-24-24-24s-24 10.7-24 24s10.7 24 24 24z" />
                        </svg> <a href="?UploadDoc" class="anchor_link">Upload Documents</a> </li>


                    <li class="side_li"><svg class="svg_logo svg_fill_37784ced" viewBox="0 0 576 512">
                            <path d="M64 0C28.7 0 0 28.7 0 64V416c0 35.3 28.7 64 64 64H80l16 32h64l16-32H400l16 32h64l16-32h16c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64zM224 320c44.2 0 80-35.8 80-80s-35.8-80-80-80s-80 35.8-80 80s35.8 80 80 80zm0 80c-88.4 0-160-71.6-160-160s71.6-160 160-160s160 71.6 160 160s-71.6 160-160 160zM480 221.3V336c0 8.8-7.2 16-16 16s-16-7.2-16-16V221.3c-18.6-6.6-32-24.4-32-45.3c0-26.5 21.5-48 48-48s48 21.5 48 48c0 20.9-13.4 38.7-32 45.3z" />
                        </svg> <a href="?Vault" class="anchor_link">Private Vault</a> </li>
                    <?php
                    // $uname=$_SESSION['uname'];
                    $sql = "SELECT * FROM `all_info` WHERE `Gmail`='karim'";
                    $result = mysqli_query($connection, $sql);

                    if ($admin_power == 1) {
                        echo '   <li class="side_li"><svg class="svg_logo svg_fill_37784ced" viewBox="0 0 448 512">
                        <path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z" />
                    </svg><a href="?Admin_Admin" class="anchor_link">Admin Login</a></li>
';
                    }
                    ?>


                    <li class="side_li"> <svg class="svg_logo svg_fill_red" viewBox="0 0 512 512">
                            <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V256c0 17.7 14.3 32 32 32s32-14.3 32-32V32zM143.5 120.6c13.6-11.3 15.4-31.5 4.1-45.1s-31.5-15.4-45.1-4.1C49.7 115.4 16 181.8 16 256c0 132.5 107.5 240 240 240s240-107.5 240-240c0-74.2-33.8-140.6-86.6-184.6c-13.6-11.3-33.8-9.4-45.1 4.1s-9.4 33.8 4.1 45.1c38.9 32.3 63.5 81 63.5 135.4c0 97.2-78.8 176-176 176s-176-78.8-176-176c0-54.4 24.7-103.1 63.5-135.4z" />
                        </svg><a href="logout.php" class="anchor_link red">Logout</a> </li>

                </ul>
            </aside>

            <div class="right">
                <?php
                if (isset($_GET)) {
                    // $clicked=true;

                    if (isset($_GET['BankDoc'])) {
                        echo '<div class="banksection">';
                        details_loader('bank');
                    } elseif (isset($_GET['Domacile'])) {
                        echo '<div class="banksection">';
                        details_loader('Domacile');
                    } elseif (isset($_GET['Land'])) {
                        echo '<div class="banksection">';
                        details_loader('land');
                    } elseif (isset($_GET['Jobdoc'])) {
                        echo '<div class="banksection">';
                        details_loader('jobs');
                    } elseif (isset($_GET['Scolarship'])) {
                        echo '<div class="banksection">';
                        details_loader('scolarship');
                    } elseif (isset($_GET['Vault'])) {
                        // echo '<div class="banksection">';
                        details_loader('vault');
                    } elseif (isset($_GET['UploadDoc'])) {

                        echo "
                       <div class='document_upload_section'>
                           <div class='document_upload_heading'>Upload Your Documents</div>
                           <form action='accessSuccess.php?fileinfo' method='POST' enctype='multipart/form-data' class='form_innerside'>
                               <div class='form_alert'>*(all are mandatory)</div>
                               <div class='documents_type_selector'>
                                   <label for='DOC' class='document_selector_label white'>Select Document Type:</label>
                                   <select name='document_type' id='document_type' class='' required>
                                       <option value='select'>Select:</option>
                                       <option value='bank'>Bank Documents</option>
                                       <option value='domacile'>Domacile Documents</option>
                                       <option value='land'>Land Fill Documents</option>
                                       <option value='jobs'>Jobs Documents</option>
                                       <option value='scolarship'>Scolarship Documents</option>
                                       <option value='private'>Private Vault</option>
                                   </select>
                               </div>
                   
                               <div class='upload_input'>
                                   <label for='doument_select' class='doument_select white'>Select Your Document: </label>
                                   <input type='file' class='document_input white' name='document_input' required>
                               </div>
                               <div class='doc_name'>
                                   <label for='doument_name' class='doc_name_label white'>Select Your Document: </label>
                                   <input type='text' class='doc_name_input white' placeholder='Enter Your Uploaded File Name' name='doc_name_input' required maxlength='30'>
                               </div>
                               <div class='submit'>
                                   <input type='submit' value='submit' class='submit_btn'>
                               </div>
                   
                           </form>
                       </div>
                   
                   ";
                    } elseif (isset($_GET['Admin_Admin'])) {
                        echo '
                        <div class="admin_list_login_div">
                            <form action="accessSuccess.php?logininfo" method="POST" style="display: flex;flex-direction:column;width:22rem;margin:auto;justify-content:center;align-items:center;border:2px solid gray;    padding-top: 2rem;
                            padding-bottom: 2rem;">
                                <label for="heading" class="verify_login_heading">Login Please</label>
                                <input type="text" name="name" placeholder="please enter name" class="admin_create_inputs" required>
                                <input type="text" name="nick_name" placeholder="please enter nick name" class="admin_create_inputs" required>
                                <input type="text" name="create_username" placeholder="please enter new username" class="admin_create_inputs" required>
                        
                                <input type="password" name="create_password" placeholder="please enter new  password" class="admin_create_inputs" required>
                        
                                <input type="text" name="vault_username" placeholder="please enter vault username" class="admin_create_inputs" required>
                        
                                <input type="password" name="vault_password" placeholder="please enter vault  password" class="admin_create_inputs" required>
                        
                                <input type="submit" class="submit_btn">
                            </form>
                        
                        </div>';
                    } elseif (isset($_GET['Logout'])) {
                        echo 'Logout';
                    }
                }
                if (isset($_GET['vault_value'])) {
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $vault_username =  mysqli_escape_string($connection, $_POST['vault_username']);
                        $vault_password =  mysqli_escape_string($connection, $_POST['vault_password']);

                        //    echo $vault_username;
                        //    echo $vault_password;
                        $sql = "SELECT * FROM `all_info` WHERE `VaultUName`='$vault_username'";
                        $result = mysqli_query($connection, $sql);


                        $num = mysqli_num_rows($result);


                        if ($num == 1) {
                            $slno =  $_SESSION['slno'];
                            $up_sql = "UPDATE `all_info` SET `VaultValue` = '1' WHERE `all_info`.`slno` = $slno";
                            $up_result = mysqli_query($connection, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                                $nickname = $row['NickName'];
                                $vault_open = $row['VaultValue'];
                                echo $vault_open;
                                if (password_verify($vault_password, $row['VaultPassword'])) {
                                    if ($vault_open == 1) {
                                        echo '<div class="banksection">';
                                        details_loader('private', "images/$nickname/private");
                                    }
                                } else {
                                    header('location:accessSuccess.php?Vault');
                                    echo "<p style='position:absolute;color:red;top:0'>Incorrect User Name And Password</p>";
                                }
                            }
                        } else {

                            echo "<p style='position:absolute;color:red;top:0'>Incorrect User Name And Password</p>";
                        }
                    }
                }
                ?>


            </div>
        </div>
        </div>
    </section>
    <script src="https://kit.fontawesome.com/623359eef8.js" crossorigin="anonymous"></script>
    <script src="./demo.js"></script>
</body>

</html>