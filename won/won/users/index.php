<?php
$servername="localhost";
$username="root";
$password="";
$dbname="user";
$connection=mysqli_connect($servername,$username,$password,$dbname);
if($connection){
    echo "success";
}
else{
    // echo "unsuccess".mysqli_error($connection);
    echo "unsuccess";
}








echo '

';






if($_SERVER['REQUEST_METHOD']=='POST'){
    $name=$_POST['name'];
    $gmail=$_POST['gmail'];
    $number=$_POST['phone'];
    $year=date("Y");
    $sl= "SSP".$year.$number;
    $sql="INSERT INTO `usersno` (`sno`, `username`, `Slno`, `gmail`) VALUES (NULL, '$name', '$sl', '$gmail')";
    $result = mysqli_query($connection, $sql);
    if($result){
        echo "true";
    }
    else{
        echo "flase";

    }
}




?>

<form action="index.php" method="POST">
    <label for="name">Name</label>
    <input type="text" name="name" id="name">
    <label for="name">gmail</label>
    <input type="text" name="gmail" id="gmail">
    <label for="name">ph number</label>
    <input type="text" name="phone" id="phone">
    <input type="submit" name="submit" id="submit">

</form>
<script>
    // const legend=document.querySelector('#karim');
    // console.log(typeof(legend));

</script>