<?php

include "./connection.php";
// echo "demo";



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>

<body>
    <form id="dataform" method="post">
        <input type="file" name="notice" id="file">
        <input type="submit">
    </form>
    <script>
        let file = document.getElementById('file')
        let data = "file-handle";
        let dataform = document.getElementById('dataform')
        dataform.addEventListener('submit', (e) => {
            e.preventDefault();

            const datas = new FormData();
            datas.append("notice", file.files[0]);
            datas.append("type", data);

            fetch("../pages/config.php", {
                method: "POST",
                body: datas
            }).then((response) => response.json()).then((result) => {
                console.log(result);
            }).catch((error) => {
                console.log(error);
            })
        })
    </script>
</body>

</html>