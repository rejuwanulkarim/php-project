<?php
$host = "cloudxerox.rf.gd";
$port = 8888;
$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("not created");
$result = socket_bind($socket, $host, $port) or die("Not Bind");
$result = socket_listen($socket, 3) or die("Not Listing");


do {
    $accpet = socket_accept($socket) or die("Not Accpet");
    $msg = socket_read($accpet, 1024);
    $msg = trim($msg);
    echo $msg . "\n";
    echo "Enter Reply\t";
    $reply = fgets(STDIN);
    socket_write($accpet, $reply, strlen($reply));
} while (true);
