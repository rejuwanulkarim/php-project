<?php

require 'simple_html_dom.php';
require "./dbconnect.php";
$sql = "SELECT * FROM `product_urls`";
$result = mysqli_query($connection, $sql);

function cardloader($url, $weblink)
{
    // echo $weblink;
    if ($weblink == "FLIPKART" || $weblink == "WWW.FLIPKART.COM") {
        $html = file_get_html("$url");
        // echo "if";
        $title = $html->find('.yhB1nd span', 0);
        $price = $html->find('._30jeq3', 0)->innertext;
        $details = $html->find('._2418kt ul', 0)->innertext;

        echo '<a href="' . $url . '">
        <div class="products">
        <div class="product_images_div flex flex_align_c flex_justify_c">
        <img src="./_images/products_images/product1.jpg" alt="Product images"
        class="products_images">
        </div>
        <div class="cards">
        <div class="product_body flex flex_dir_row">
        <div class="product_details flex flex_dir_col padding_top_1rem">
        <div class="product_title">' . $title . '</div>
        <div class="product_clasification">
        <ul >
        ' . $details . '
                                                   </ul>
                                           </div>
                                           </div>
    
                                           <div class="price_product_company flex flex_dir_col">
                                           <div class="price">Only ' . $price . '</div>
                                           <div class="brand_logo">
                                           <img src="./_images/brand_logo/' . $weblink . '"
                                           alt=" Brand Logo"
                                           class="brand_logo_img">
                                           </div>
                                           </div>
                                           </div>
                                           </div>
                                           
                                           </div>
                                           </a>';
    } elseif ($weblink == "AMAZON" || $weblink == "WWW.AMAZON.COM") {
        // $html = file_get_html("$url");
        echo "<br>ELSEIF<br>";
   
    } else {
        echo "else";
    }
}

// echo $price;
// echo $title;

while ($row = mysqli_fetch_assoc($result)) {
    $purl = $row['producturl'];
    $site = $row['sitename'];
    // strtoupper($site);
    $name = explode(".", $purl);
    cardloader($purl, strtoupper($site));
}
