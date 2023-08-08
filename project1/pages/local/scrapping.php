<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bikreta";
global $connection;
session_start();
$connection = mysqli_connect($servername, $username, $password, $dbname);

$_SESSION['connection']=$connection;
require './simple_html_dom.php';
function pageload($url, $slno)
{
        $html = file_get_html("$url");
        global $price;
        $price = $html->find('.CEmiEU div', 1)->innertext;
        // echo $price . '<br>';
        global $title;
        $title = $html->find('.yhB1nd span', 0);
        // echo $title . '<br>';
        global $details;
        $details = $html->find('._2418kt ul', 0)->innertext;
        $image_link = "";
        $site = parse_url($url);

        $array = ['www.flipkart.com', 'www.amazon.com'];

        if ($site['host'] == 'www.flipkart.com' || $site['host'] == 'flipkart.com' || $site['host'] == 'flipkart') {
                $sitename = "flipkart";
        }
        
        $sql = "UPDATE `product`SET `sitename`='$sitename',`producttitle`= '$title',`price`='$price',`image_url`='$image_link',`details`='$details' WHERE `product`.`slno`='$slno'";
        $connection=$_SESSION['connection'];
        $result = mysqli_query($connection, $sql);
        if ($result) {
                $Update_product = true;
                echo "Product updated";
        }
}
while ($num = mysqli_fetch_assoc($result)) {
        $product_link = $num['productlink'];
        $slno = $num['slno'];


        // echo "$product_link<br><br>";
        // echo "$slno<br><br>";
        // $product_link=$num[''];

        pageload($product_link,$slno);

}
