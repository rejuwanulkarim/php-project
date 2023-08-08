<?php
session_start();
$login = $_SESSION['logedin'];
$slno = $_SESSION['slno'];
$profile = $_SESSION['profile'];
$req = $_SERVER['HTTP_USER_AGENT'];
$ip = $_SERVER['REMOTE_ADDR'];

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
    <title>User</title>
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="../assets/nav.css">
</head>

<body onload="customerDetails() ,overview(),alertSender() ">
    <?php
    include "./navbar.php";
    ?>





    <div class="alert-msg-nor">
        <div id="massage"></div>
    </div>
    <section class="user-details">
        <div class="user-adder">
            <h3 class="heading">Add Customer</h3>
            <!-- <h3 class="heading">reset</h3> -->
            <form action="./user.php" class="customer-form" method="post">
                <input type="text" name="name" id="customer-name" class="login-inputs user-add-inputs" placeholder="Enter Customer Name" required>
                <!-- <input type="number" name="color_print" id="color-print" class="login-inputs user-add-inputs" placeholder="Total Color Print" value="" required> -->
                <!-- <input type="number" name="black_print" id="black-white-print" class="login-inputs user-add-inputs" placeholder="Total Black and White Print" value="" required> -->
                <input type="text" class="login-inputs print-type" name="print-type" maxlength="20" placeholder="Type of print" disabled require>
                <div class="print-type-chooser">
                    <button value="bp" onclick="printchoicer(this.value)" class="print-choicer" type="button">Black Print</button>
                    <button value="cp" onclick="printchoicer(this.value)" class="print-choicer" type="button">color Print</button>
                    <button value="mp" onclick="printchoicer(this.value)" class="print-choicer" type="button">Micro Print</button>
                    <button value="bx" onclick="printchoicer(this.value)" class="print-choicer" type="button">black xerox</button>
                    <button value="cx" onclick="printchoicer(this.value)" class="print-choicer" type="button">color xerox</button>
                    <button value="others" onclick="printchoicer(this.value)" class="print-choicer" type="button">passport size photo</button>
                    <button value="others" onclick="printchoicer(this.value)" class="print-choicer" type="button">Stamp Size photo</button>
                    <button value="others" onclick="printchoicer(this.value)" class="print-choicer" type="button">others</button>
                    <button value="" onclick="printchoicer(this.value)" class="print-choicer" type="button">Reset</button>

                </div>
                <input type="number" class="login-inputs print-quantity" name="print-quantity" maxlength="4" placeholder="Quantity of print">
                <input type="float" class="login-inputs print-cost" name="print-cost" maxlength="3" placeholder="Cost/Page">

                <div class="payment">
                    <label for="Payment Type">Payment Mode:&nbsp;</label>
                    <input type="radio" name="payment_type" id="payment-type" class="payment-type user-add-inputs" value="Online">
                    <input type="radio" name="payment_type" id="payment-type" class="payment-type user-add-inputs" value="Offline">
                    <input type="radio" name="payment_type" id="payment-type" class="payment-type user-add-inputs" value="Due">
                </div>
                <div class="total">
                    <p><b>Total:&nbsp;</b></p>
                    <p class="cal-price"></p>
                    <p>rs</p>
                </div>
                <button type="submit" id="add-btn" class="submit">Add +</button>
            </form>
        </div>
        <div class="user-lists">
            <h3 class="heading">Customer Details</h3>
            <div class="user-search">
                <input type="text" name="search" id="search" oninput="search(this.value)" placeholder="Search By Name..." width="80%">
                <button id="customer-reloader" onclick="customerDetails()">Reload Data</button>
            </div>
            <div class="user-cards">
                <!-- this card comment only for backup card -->
                <!-- <div class="card">
                    <p class="username">Md Rejuwanul Karim</p>
                    <p>rejuwanulkarim@gmail.com</p>
                    <p>7478919026</p>
                    <p>color print:&nbsp;15pice</p>
                    <p>Black and White print:&nbsp;15pice</p>
                    <p>Payment Mode :&nbsp; Online</p>
                    <p>Date: 10-02-2003</p>

                </div>-->

                <div id="alert">No customer Found:)</div>

            </div>
        </div>
        <div class="overview-section">

            <h3 class="heading">Overview</h3>
            <hr style="width:100%;">
            <div class="overview">
                <div class="overview-sec">
                    <b>Due:₹ </b>
                    <p class="overview-counter" id="due" data="due">00</p>
                </div>
                <div class="overview-sec"><b>Total Income:₹</b>
                    <p class="overview-counter" id="total" data="total">000</p>
                </div>
                <div class="overview-sec"><b>Color Print:</b>
                    <p class="overview-counter" id="cp">000</p>
                </div>
                <div class="overview-sec"><b>Black Print:</b>
                    <p class="overview-counter" id="bp">000</p>
                </div>
                <div class="overview-sec"><b>Micro Print:</b>
                    <p class="overview-counter" id="mp">000</p>
                </div>
                <div class="overview-sec"><b>Black Xerox:</b>
                    <p class="overview-counter" id="bx">000</p>
                </div>
                <div class="overview-sec"><b>Color Xerox:</b>
                    <p class="overview-counter" id="cx">000</p>
                </div>
                <div class="overview-sec"><b>Others:</b>
                    <p class="overview-counter" id="others">000</p>
                </div>
            </div>
        </div>
    </section>






    <script src="../assets/main.js"></script>
</body>
<script>
    const alertSender = () => {


        let data = {
            email: "rejuwanulkarim@gmail.com"
        };
        let output = {
            action: "login-alert",
            data: data
        };

        fetch("../api/crud.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/text",
                "X-API-Key": "7b951ca15de226dfaf51232374a150eb",
            },
            body: JSON.stringify(output),
        }).then((response) => response.json()).then((result) => {
            console.log(result);
        }).catch((err) => {
            console.log(err);
        })
    }
</script>


</html>