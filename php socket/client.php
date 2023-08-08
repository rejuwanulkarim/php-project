<?php
$host = "localhost";
$port = 20568;

if (isset($_GET['msg'])) {
$msg=$_GET['msg'];

    $socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("not created");
    socket_connect($socket, $host, $port) or die("NOt Connect");
    // $msg = "<br>I am Socket";
    socket_write($socket, $msg, strlen($msg));



    $reply = socket_read($socket, 1024);
    $reply = trim($reply);
    echo $reply;
    socket_close($socket);
}


?>

<form action="./client.php">
    <input type="text" name="msg" id="msg">
    <input type="submit" value="submit">
</form>