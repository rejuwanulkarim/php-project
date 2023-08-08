<?php
include './dbconnect.php';
require './simple_html_dom.php';

// function pageload($url)
// {
$url = "https://www.flipkart.com/egate-i9-pro-max-fhd-1080p-3600-lm-1-speaker-remote-controller-portable-projector/p/itm4daffbd42cb18?pid=PROGG7M8JGJGPHW9&lid=LSTPROGG7M8JGJGPHW99JBS5B&marketplace=FLIPKART&store=6bo%2Ftia%2F1hx&srno=b_1_1&otracker=hp_omu_Best%2Bof%2BElectronics_5_3.dealCard.OMU_L8ODUNVTH1M5_3&otracker1=hp_rich_navigation_PINNED_neo%2Fmerchandising_NA_NAV_EXPANDABLE_navigationCard_cc_4_L2_view-all%2Chp_omu_PINNED_neo%2Fmerchandising_Best%2Bof%2BElectronics_NA_dealCard_cc_5_NA_view-all_3&fm=neo%2Fmerchandising&iid=en_uMExdtLZYOWmDndt93vi7aJljjEueIloK8XJXRfvEjsQ9BxDoeyumnKe8G8L5rC20AVgqXFb5IR2d2M0Zr2SEw%3D%3D&ppt=browse&ppn=browse&ssid=ihrmkngrps0000001672572611926";
try {
    $html = file_get_html("$url");
    $price = $html->find('._25b18c', 0)->plaintext;
    echo $price . '<br>';
} catch (Exception $e) {
    echo "not fatch$e";
}



$sql = "SELECT * FROM `product`";
$result = mysqli_query($connection, $sql);
while ($num = mysqli_fetch_assoc($result)) {
    $product_link = $num['productlink'];
    $slno = $num['slno'];
    echo "<br><br><br>$product_link<br><br><br>$slno";
}
