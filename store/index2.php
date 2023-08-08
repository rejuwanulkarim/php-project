<?php

include "./connections/connections.php";



$email = "rejuwanulkarim@gmail.com";
$req = $_SERVER['HTTP_USER_AGENT'];
$ip = $_SERVER['REMOTE_ADDR'];
$sql = "INSERT INTO `history` (`history`,`ip`,`date`) VALUES ('$req','$ip',CURRENT_TIMESTAMP());";
$result = mysqli_query($connection, $sql);
$body = "<b style='color:red;'>New Login Detected</b><br><br><b>Browser Details:-</b>$req<br><b>IP:-</b>$ip<br>Go to website and check<a href='http://rejublogspot.epizy.com/'>Click Here to check</a>";

if ($result) {
  require_once("./api/smtp/PHPMailerAutoload.php");
  $mail = new PHPMailer(true);
  $mail->isSMTP();
  $mail->Host = "smtp.gmail.com";
  $mail->Port = 587;
  $mail->SMTPSecure = "tls";
  $mail->SMTPAuth = true;
  $mail->Username = "karimdr341@gmail.com";
  $mail->Password = "fakqlhcursmxyjmy";
  $mail->SetFrom("karimdr341@gmail.com");
  $mail->addAddress("$email");
  $mail->IsHTML(true);
  $mail->Subject = "Login Alert";
  $mail->Body = "$body";
  $mail->SMTPOptions = array('ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => false
  ));
  if ($mail->send()) {
    echo json_encode(array("status" => "success"));
    mysqli_close($connection);
  } else {
    echo json_encode(array("status" => "error"));
    mysqli_close($connection);
  }
} else {
  echo json_encode(array("status" => "error"));
  mysqli_close($connection);
}
  // echo json_encode(array("status" => "success"));
