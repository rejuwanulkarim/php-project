<?php


require 'simple_html_dom.php';
require "./dbconnect.php";
$sql = "SELECT * FROM `product`";
$result = mysqli_query($connection, $sql);

function cardloader($url, $weblink, $link_slno)
{
        // echo $weblink;
        if ($weblink == "FLIPKART" || $weblink == "WWW.FLIPKART.COM") {
                $html = file_get_html("$url");
                // echo "if";
                $title = $html->find('.yhB1nd span', 0)->innertext;
                $price = $html->find('._30jeq3', 0)->innertext;
                $details = $html->find('._2418kt ul', 0)->innertext;
                $image_url = $html->find('._396cs4', 0)->src;
                // echo $title;
                // if()
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "bikreta";
                $connection = mysqli_connect($servername, $username, $password, $dbname);
                $sql = "UPDATE `product` SET `sitename` = 'flipkart', `producttitle` = '$title', `productlink` = '$url', `image_url`='$image_url',`price`='$price',`details`='$details' WHERE `product`.`slno` = $link_slno;";
                $result = mysqli_query($connection, $sql);
        } elseif ($weblink == "AMAZON" || $weblink == "WWW.AMAZON.COM") {
                // $html = file_get_html("$url");
                echo "<br>ELSEIF<br>";
        }else{
                echo "No product found";
        }
}

// echo $price;
// echo $title;

while ($row = mysqli_fetch_assoc($result)) {
        $purl = $row['productlink'];
        $slno = $row['slno'];
        echo $slno;
        $site = $row['sitename'];
        // strtoupper($site);
        $name = explode(".", $purl);

        cardloader($purl, strtoupper($site), $slno);
}
