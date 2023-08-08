<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body onload="loadi()">
 




    <input type="text" name="text" id="text">
    <button onclick="sendData()">Send Now</button>

    <div id="msgbox"></div>

    <?php
    if (isset($_GET['data'])) {
        $data = $_GET['data'];
        echo "  <script>
        // let prom = prompt('Enter Your Name');

        let conn = new WebSocket('ws://localhost:8080');
        conn.onopen = function(e) {
            console.log('Connection estabilish')
        }
        conn.onmessage = (e) => {
            document.getElementById('msgbox').innerHTML+=e.data
            console.log(e.data)
        }

        
        function loadi() {
            setTimeout(() => {
                conn.send('Hi I am NODEMCU')
            }, 3000)

        }
    </script>";
    }
    ?>
    <script>
        // let prom = prompt("Enter Your Name");
        
    </script>

</body>

</html>