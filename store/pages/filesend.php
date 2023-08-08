<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send-File</title>
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="../assets/nav.css">
</head>

<body>
    <?php include "./navbar.php";  ?>


    <div class="file-uploader-sec">
        <h2>Send Your Files</h2>
        <form action="./filesend.php">
            <div class="upload-file">
                <input type="file" name="uploadfiles" class="file-input">
                <label for="Upload File"><img src="../webImages/upload-file.gif" alt=""> <span>Send Here</span></label>
            </div>
        </form>
    </div>

</body>

</html>