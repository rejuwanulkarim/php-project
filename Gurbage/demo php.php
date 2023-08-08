<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$con = mysqli_connect($servername, $username, $password, $dbname);
if (!$con) {
    echo "we cannot find any database" . mysqli_connect_error();
} else {
    echo "connection successfully";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $filename = $_FILES['inputfile']['name'];
    $tempfile = $_FILES['inputfile']['tmp_name'];
    // $tempfiles = $_FILES['inputfile']['size'];
    // if($tempfiles>1000000){
    //     echo "<br>plz upload a small file<br>";
    // }
    $folder = "images/" . $filename;
    move_uploaded_file($tempfile,$folder);
    echo '<img src="'.$folder.'" width="100" height="100">';

    // echo $tempfile;


    // echo $_FILES['inputfile'];
    print_r($_FILES['inputfile']);
    // echo $filename;


    // $name = $_POST['name'];
    // $number = $_POST['number'];

    // $sql = "INSERT INTO `demo` (`name`, `phno`, `filepath`) VALUES ('$name', '$number', '$folder')";
    // $result = mysqli_query($con, $sql);
    // if (isset($result)) {
    //     echo "not submited";
    // } else {
    //     echo "submited";
    // }


}
// $sql = "SELECT * FROM `demo` ";
// $result = mysqli_query($con, $sql);

// if (mysqli_num_rows($result) > 0) {
//   // output data of each row
//   while($row = mysqli_fetch_assoc($result)) {
//     echo $row["name"]."  ".$row['filepath'].'<br>';
//     echo '<img src="'.$row['filepath'].'" alt=""  width="100" height="100">';
//   }
// } else {
//   echo "0 results";
// }

// mysqli_close($con);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        .preview {
            height: 12rem;
            width: 15rem;
            border: 2px solid red;
        }
    </style>
    <div class="form">
        <form action="" method="post" enctype="multipart/form-data">
            <!-- <input type="text" placholder="name" name="name" id="name">
            <input type="number" placholder="number" name="number" id="number"> -->
            <input type="file" placholder="inputfile" name="inputfile" id="inputfile">
            <input type="submit" name="submit">
        </form>
    </div>
    <img >
<!-- <video class="preview"></video> -->

<img  class="preview" alt="">
<script>
        let i = document.querySelector('#inputfile');
        const p = document.querySelector('.preview');

        if (i.files>100){
            alert('helll')
        document.getElementsByTagName('form')[0].onsubmit = (e) => {
            e.preventDefault();
            if (i.files[0].size>100) {
                console.log('cant');
                return false;
            }
        }
    }
    console.log(i.files[0].size)

        function demo(input, preview) {
            input.addEventListener('input', () => {
                preview.src = URL.createObjectURL(input.files[0]);
            })
        }
        demo(i, p);
        // console.log(preview)
        // console.log(prev)
    </script>
</body>

</html>