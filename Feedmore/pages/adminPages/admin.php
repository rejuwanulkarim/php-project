<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <input type="text" name="text" id="text">
    <button onclick="sendData()">Send Now</button>

    <div id="msgbox">
        <!-- <audio autoplay src='./success.mp3'></audio> -->
    </div>
    <audio id="aud">
        <source src='./success.mp3' type='audio/mp3'>
        </source>
    </audio>

    <script>
        // let prom = prompt("Enter Your Name");

        let conn = new WebSocket("ws://localhost:8080");
        conn.onopen = function(e) {
            console.log("Connection estabilish")
        }
        conn.onmessage = (e) => {
            let msgbox = document.getElementById('msgbox')
            // console.log(e)
            // msgbox.innerHTML = e.data + "<br>"
            if (e.data != "") {

                // let audio = `   <audio autoplay>
                // <source src='./success.mp3' type='audio/mp3'>
                // </source>
                // </audio>`
                // msgbox.innerHTML = audio
                let aud = document.getElementById('aud')
                aud.play()
                setTimeout(() => {
                    aud.pause()

                }, 2000)
            }


        }


        const sendData = () => {
            let textVal = document.getElementById('text').value;
            conn.send(textVal)


        }
    </script>

</body>

</html>