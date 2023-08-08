<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/nav.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <title>Home</title>
</head>

<body>

    <?php require "./pages/userPages/navbar.php"; ?>

    <section class="banner">
        <div class="banner-left-sec">
            <p class="quote">Are You Hungry?</p>
            <h4>Don't Wait !</h4>
            <button class="order-btn">Order Now</button>
        </div>
        <div class="banner-right-sec">
            <img src="./assets/images/UPPER.png" alt="banner" class="upper-banner">
        </div>
    </section>

    <section class="food-items">
        <p class="head-food-card">All Items !</p>
        <div class="foods-cards"></div>
    </section>




















    <!-- 
    <input type="text" name="text" id="text">
    <button onclick="sendData()">Send Now</button>

    <div id="msgbox"></div> -->


    <script>
        // let prom = prompt("Enter Your Name");

        let conn = new WebSocket("ws://localhost:8080");
        conn.onopen = function(e) {
            console.log("Connection estabilish")
        }
        conn.onmessage = (e) => {
            let msgbox = document.getElementById('msgbox')
            // msgbox.innerHTML += e.data + "<br>"
            // console.log(e)
        }


        const sendData = () => {
            let textVal = document.getElementById('text').value;
            conn.send(textVal)


        }
    </script>

</body>

</html>