<?php
// function pageload($url)
// {
// $url = "https://www.flipkart.com/redmi-9i-sport-metallic-blue-64-gb/p/itmeb95d0b4616cc?pid=MOBG6WQWQZZMGQCU&lid=LSTMOBG6WQWQZZMGQCUXA6EPW&marketplace=FLIPKART&q=redmi&store=tyy%2F4io&srno=s_1_1&otracker=search&otracker1=search&iid=4ea5d9ff-6b10-4c2c-a878-43512f1a173a.MOBG6WQWQZZMGQCU.SEARCH&ssid=5if6ok88u80000001672665759109&qH=9b6bf0057c19bd94";

//     $html = file_get_html("$url");
//     for($i=0;$i<5;$i++){
//     $product_brand = $html->find('._2whKao', $i)->plaintext;

//     echo "<pre>";

//     print_r($product_brand);
//     }


// 0<and >41111




// elseif (isset($_GET['catagory'])) {
//     $category_filter = $_GET['catagory'];
//     $sql = "SELECT * FROM `product` WHERE `producttype` LIKE '%$category_filter%'"; -->



include "./dbconnect.php";





$fetch_sql = "SELECT * FROM `product`";
$fetch_result = mysqli_query($connection, $fetch_sql);
global $price;
$product_price_array = array(10, 50);
while ($num = mysqli_fetch_assoc($fetch_result)) {

    
    $db_price = $num['price'];
    $a=array($db_price);
    $slno = $num['slno'];
    $RSremovw_price = str_replace("₹", "", "$db_price");
 
    // if($price!=null || $price!="" || $price!=false){
        echo "<pre>";
        sort($a);
        print_r($a);
        echo "</pre>";
    // }
    // for ($i = 0; $i < count($product_price_array); $i++) {
        //  echo $product_price_array[8];
        // }
    }
$price = str_replace(",", "", "$RSremovw_price");
array_push($product_price_array, $price);


echo "<pre>";
print_r($product_price_array);