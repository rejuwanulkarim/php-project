<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>load</title>
</head>
<body onload="loded()">
    

<script>
    function loded(){
        alert('page is loaded')
    }
</script>
</body>
</html>


<?php
// include './simple_html_dom.php';
// $html=file_get_html('https://www.flipkart.com/samsung-galaxy-f23-5g-aqua-blue-128-gb/p/itme54bc0c2292f4?pid=MOBGBKQF45XPEUHA&lid=LSTMOBGBKQF45XPEUHATCA8X7&marketplace=FLIPKART&q=f23+5G&store=tyy%2F4io&srno=s_1_1&otracker=search&otracker1=search&fm=neo%2Fmerchandising&iid=bdafc976-69e8-4ca7-8b26-c877c1534275.MOBGBKQF45XPEUHA.SEARCH&ppt=hp&ppn=homepage&ssid=pgs4sfnxuo0000001665024769534&qH=bf9ce5ab97f87475');
// $rupi=$html->find('.CEmiEU div',1)->innertext;
// echo $rupi. '<br>';
// $title=$html->find('.yhB1nd span',0);
// echo $title
// $html = file_get_contents('https://www.amazon.in/DIXCY-Mens-Vest-K1-PR44947_Wine/dp/B07D75PQD8?ref_=Oct_DLandingS_D_25534edb_61&smid=A1WYWER0W24N8S');
// a-price-whole
// $start = stripos($html, 'class="a-span12[0]"');

// $end = stripos($html, '<h2>', $offset = $start);

// $length = $end - $start;

// $htmlSection = substr($html, $start, $length);
// $h=new $html;
// echo $html;

// echo var_dump($h);


// $ch=curl_init();
// curl_setopt($ch,CURLOPT_URL,'https://www.amazon.in/Adidas-Mens-Clinch-X-Running-Black/dp/B08FZSY61B/ref=sr_1_1?pf_rd_i=1983518031&pf_rd_m=A1VBAL9TL5WCBF&pf_rd_p=3a926c12-09e4-4795-996e-a747ca50ac16&pf_rd_r=XW05MM8Z6294YPVSW4K3&pf_rd_s=merchandised-search-6&qid=1664192433&refinements=p_89%3AAdidas%7CPuma%7CReebok&rnid=3837712031&s=apparel&sr=1-1');
// curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

// $html=curl_exec($ch);
// // echo $html; 
// $dom=new DOMDocument();

// @ $dom->loadHTML($html);
// $finder= $dom->getElementsByTagName('tbody tr');
// $finder=$finder->item(0);

// echo '<pre>';
// echo $finder;
// curl_close($ch);

// $url="https://img1.wsimg.com/isteam/ip/d0f30c97-4150-4350-b4e7-53f5b031310c/Drugs-seized-in-frozen-chicken.jpg/:/cr=t:0%25,l:0%25,w:100%25,h:100%25/rs=w:1300,h:800";
// $path="demo.jpg";
// $fopen=fopen($path,'w+');
// $ch=curl_init($url);
// curl_setopt($ch,CURLOPT_URL,$url);
// curl_exec($ch);
// curl_close($ch)
// $url="";
// if(isset($_Get['url'])){
// $url=$_Get['url'];
// }
// echo "<a href='$url' download='$url'>Download</a>";

// include('simple_html_dom.php');

// $html = file_get_html('https://www.amazon.in/Adidas-Mens-Clinch-X-Running-Black/dp/B08FZSY61B/ref=sr_1_1?pf_rd_i=1983518031&pf_rd_m=A1VBAL9TL5WCBF&pf_rd_p=3a926c12-09e4-4795-996e-a747ca50ac16&pf_rd_r=XW05MM8Z6294YPVSW4K3&pf_rd_s=merchandised-search-6&qid=1664192433&refinements=p_89%3AAdidas%7CPuma%7CReebok&rnid=3837712031&s=apparel&sr=1-1');
// echo $html->find('#productTitle',0)->innertext;

// $html = file_get_html("https://www.flipkart.com/roadster-women-solid-casual-yellow-shirt/p/itm83442fbde5127?pid=SHTEV4C8HMT6NMAQ&lid=LSTSHTEV4C8HMT6NMAQW7QUQF&marketplace=FLIPKART&store=clo%2Fash&srno=b_1_1&otracker=hp_omu_Fashion%2BBrands%2Bon%2BDiscounts_1_14.dealCard.OMU_AOK9YS17ZPQ4_13&otracker1=hp_omu_PINNED_neo%2Fmerchandising_Fashion%2BBrands%2Bon%2BDiscounts_NA_dealCard_cc_1_NA_view-all_13&fm=neo%2Fmerchandising&iid=747da530-1eee-40f5-b73f-fdd1ad4d2931.SHTEV4C8HMT6NMAQ.SEARCH&ppt=browse&ppn=browse&ssid=g4mnz99rz40000001664193013598");
// // echo '<pre>';
// echo $html;
// echo $html->find('.CEmiEU._30jeq3 _16Jk6d', 0)->innertext;

// $html=file_get_html("https://www.mid-day.com/sports");

// echo $html->find('ul.newsList300',0)->innertext;



















// pageload($row['ProductLink']);





















?>