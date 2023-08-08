<?php
session_start();
if (isset($_SESSION['loggedin'])&&isset($_SESSION['username'])) {
    session_unset();
    session_destroy();
    header('location: ./login.php');
}
// session_start();
// header('location: ./login.php?eid');
// $sql = "DELETE FROM `commentform` WHERE `commentform`.`slno`";
// if(isset($_SESSION['username'])==$sql)
// {
//     session_unset();
//     session_destroy();
//     header('location: ./login.php');
// }
// session_destroy();

?>
