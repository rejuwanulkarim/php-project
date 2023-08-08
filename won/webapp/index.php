<?php
// INSERT INTO `note` (`sno`, `title`, `desk`, `tstamp`) VALUES ('1', 'demo', 'this is demo desc', '2022-05-31 14:51:36.000000');
$insert = false;
// echo "connect mySQL";
$servername = "localhost";
$username = "root";
$password = "";
$database = "notes";

$con = mysqli_connect($servername, $username, $password, $database);

// if(!$con){
//     die ("connected unsuccessfully!<br>".mysqli_connect_error());
// }
// else{
//     echo "connected successfully<br>";

// }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $title = $_POST["title"];
  $desc = $_POST["desc"];
  $sql = "INSERT INTO `note` (`title`, `descr`) VALUES ('$title','$desc')";
  $result = mysqli_query($con, $sql);


  if ($result) {
    $insert = true;
  } else {
    echo "connection unsuccess" . mysqli_error($con);
  }
}

// $delete = "DELETE FROtli dM `note` WHERE `note`.`sno` = 50";
// $delet1 = mysqli_query($con, $delete);
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>app</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


</head>

<body>

  <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <nav class="navbar navbar-expand-lg bg-dark myl-5">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <?php

  if ($insert) {
    echo " <div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Your Note has been successfully.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
  }
  ?>
  <div class="container my-4">

    <form action="index.php" method="POST">
      <div class="mb-3">
        <label for="title" class="form-label">Note Title</label>
        <input type="text" id="title" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Description</label>
          <textarea class="form-control" id="desc" name="desc" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add List</button>
    </form>
  </div>
  <div class="container my-4">

    <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">S.No</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>

        <?php
        $sql = "SELECT * FROM `note`";
        $result = mysqli_query($con, $sql);
        $year=date("Y");
        // $sno = 0;
        while ($row = mysqli_fetch_assoc($result)) {
          // $sno = $sno + 1;
          echo "<tr>
<td scope='col'>"."SSP". $row['sno'].$year. "</td>
<td scope='col'>" . $row['title'] . "</td>
<td scope='col'>" . $row['descr'] . "</td>
<td scope='col'><button class='edit btn btn-sm btn-primary'>Edit</button> <a href='/del'>Detete</a></td>
</tr>";
        }




        // echo $row['sno']." ".$row['title']." ".$row['desc'];

        ?>

      </tbody>
    </table>

  </div>


  <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
    });
  </script>

  <script>
    // edits = document.getElementsByClassName('edit');
    // Array.from(edits).forEach((element)=>{
    //   element.addEventListener("click",(e)=>{
    //     // console.log("edit ", );
    //     tr=e.target.parentNode.parentNode;
    //     title=tr.getElementsByTagName("td")[1].innerText;
    //     description=tr.getElementsByTagName("td")[2].innerText;
    //     console.log(title,description);
    //     titleEdit.value=title;
    //     descEdit.value=desc;
    //     // $('#editModal').modal('toggle');



    //   })
    // })
  </script>
</body>

</html>