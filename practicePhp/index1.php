<?php

// $con = mysqli_connect('localhost', 'root', '', 'practice');
// if($con){
//     echo 'success';
// }
if (isset($_POST['ifsc'])) {
    $ifsc=$_POST['ifsc'];
    // $name = $_POST['name'];
    // $gmail = $_POST['gmail'];
    // $phoneno = $_POST['phoneno'];
    $json=file_get_contents('https://ifsc.razorpay.com/'.$ifsc);
    echo '<pre>';
    // $arr=json_decode($json);
    echo $json;
    // print_r($name,$gmail,$phoneno);
    // echo $name . '<br>';
    // echo $gmail . '<br>';
    // echo $phoneno . '<br>';
    // $sql = "INSERT INTO `data` (`slno`, `name`, `gmail`, `phone`) VALUES (NULL, '$name', '$gmail', '$phoneno')";
    // $result = mysqli_query($con, $sql);
}

?>
<form action="" method="post">
    <input type="text" name="ifsc">
    <!-- <input type="text" name="name">
    <input type="text" name="gmail">
    <input type="text" name="phoneno"> -->
    <input type="submit" name="btn">
</form>
<!-- <div class="containt">
    <select name="select" id="select" onchange="getdata(this.options[this.selectedIndex].value)"> -->
<?php
// $sql2 = "SELECT * FROM `data` order by name";
// $result2 = mysqli_query($con, $sql2);
// while ($row = mysqli_fetch_assoc($result2)) {
//     if( $row['name']==""||$row['name']==" "){
//         // echo 'Empty'.'<br>';
//         continue;
        
//     }else{
//         echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
        
//     }
// }


?>



    </select>

</div>
<script>
    function getdata(id){
        console.log(id)
    }
</script>