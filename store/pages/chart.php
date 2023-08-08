<?php
session_start();
$login = $_SESSION['logedin'];
$slno = $_SESSION['slno'];
$profile = $_SESSION['profile'];
if ($login != true) {
    header("location:../index.php");
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Due Chart</title>
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="../assets/nav.css">
</head>

<body>
    <?php
    include "./navbar.php";
    ?>
    <h3 class="heading">Due List</h3>
    <table>
        <thead>
            <th>Slno</th>
            <th>Name</th>
            <th>Print Quantity</th>
            <th>Cost</th>
            <th>Print Type</th>
            <th id="total-price">Price()</th>
            <th>Date</th>
            <th>Action</th>

        </thead>
        <tbody>

            <?php
            require "../connections/connections.php";
            $sql = "SELECT * FROM `mystore` WHERE `payment_type`='due'";
            $result = mysqli_query($connection, $sql);
            $slno = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "  <tr>
        <td>" . $slno++ . "</td>
        <td>" . $row['name'] . "</td>
        <td>" . $row['print_quantity'] . "</td>
        <td>" . $row['cost'] . "</td>
            <td>" . $row['print_type'] . "</td>
            <td class='price'>" . $row['total_price'] . "</td>
            <td>" . $row['date'] . "</td>
            <td><button onclick='paidDue(" . $row['slno'] . ")'>Paid</button></td>
        
    </tr>";
            }

            ?>
        </tbody>
    </table>




    <script>
        const MyApi = "7b951ca15de226dfaf51232374a150eb";

        function paidDue(slno) {
            let duePrompt = prompt("Paymtnt Mode?");
            console.log(duePrompt)
            if (duePrompt != null) {


                let data = {
                    serial: slno,
                    payment: duePrompt
                };
                let output = {
                    action: "payment_update",
                    data: data
                };
                fetch("../api/crud.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/text",
                        "X-API-Key": MyApi,
                    },
                    body: JSON.stringify(output),
                }).then((response) => response.json()).then((result) => {
                    console.log(result);
                    if (result.status == "success") {
                        location.reload();
                    } else {
                        location.reload();

                    }
                }).catch((err) => {
                    location.reload();
                    console.log(err)
                })
            }
        }

        let price = document.getElementsByClassName('price');
        let totalPrice = 0
        for (let i = 0; i < price.length; i++) {
            let pr = Number(price[i].innerHTML)
            totalPrice += pr
        }
        // console.log(priceStore)
        let totalSec = document.getElementById('total-price');
        totalSec.innerHTML = `Price&nbsp;(&nbsp;<b style="color:red;">₹${totalPrice}</b>&nbsp;)`
    </script>
</body>

</html>