<?php
include "./dbconnect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $catagory = $_POST['catagory'];
    $minimum_price = $_POST['minimum_price'];
    $maximum_price = $_POST['maximum_price'];
    // $elsctronics_brand_name=$_POST[''];


}
session_start();
function print_product($slno)
{
    
    include "./dbconnect.php";
    if ($slno != "" || $slno != null || $slno != false) {
        $sql = "SELECT * FROM `product` WHERE `slno`=$slno";
    } else {
        $search = $_GET['search'];
        $sql = "SELECT * FROM `product` WHERE `producttitle` LIKE '%$search%'";
    }
    $result = mysqli_query($connection, $sql);


    while ($row = mysqli_fetch_assoc($result)) {
        $url = $row['productlink'];
        $title = $row['producttitle'];
        $price = $row['price'];
        $image_url = $row['image_url'];
        $details = $row['details'];
        // strtoupper($site);
        $sitename = $row['sitename'];
        // cardloader($purl, strtoupper($site));
        echo '<a href="' . $url . '" style="text-decoration:none;">
    <div class="products">
    <div class="product_images_div">
    <img src="' . $image_url . '" alt="Product images"
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
                                       <img src="../../_images/partner_logo/' . strtoupper($sitename) . '.png"
                                       alt=" Brand Logo"
                                       class="brand_logo_img">
                                       </div>
                                       </div>
                                       </div>
                                       </div>
                                       
                                       </div>
                                       </a>';
    }
}









?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/phone.css">
</head>

<body>
    <header>
        <div class='navbar'>
            <div class='nav_left'>
                <img src='../../_images/credentials_images/nav_logo.jpg' alt='navbar logo' id='website_logo'>
            </div>
            <div class='nav_mid'>
                <ul>
                    <li><a href='#'>Home</a></li>
                    <li><a href='#'>About Us</a></li>
                    <li><a href='#'>Contact Us</a></li>
                    <label class='switch'>
                        <input type='button' value='Light Mood' id='light_dark_btn'>
                        <span class='hover_text'>change your favourite theme</span>
                    </label>
                </ul>
                <form action='product.php' id='search_form' method='GET' class='search_form'>
                    <input type='text' name='search' placeholder='Search Here...' id='search_input' required>
                    <input type='submit' class='fas' value='&#xF002;' id='search_btn'>
                    <!-- <i class='fa-solid fa-magnifying-glass' value='submit'>dhabs</i> -->
                </form>
                <div class='hambarger'>
                    <span class='hambar_line'></span>
                    <span class='hambar_line'></span>
                </div>
            </div>
            <!-- <div class='nav_right'></div> -->
        </div>
    </header>

    <section class="product_cards">

        <div class="heading_of_product">OUR PRODUCT</div>
        <div class="products_card_body">
            <div class="filter_section">
                <p class="filter_heading">Filter</p>
                <hr>
                <div class="filter_body">
                    <h1 class="brand_selector_title">Select Brand</h1>
                    <hr>
                    <form action="product.php" method="GET">
                        <select name="catagory" id="catagory" class="select">
                            <option value="">Select catagory</option>
                            <option value="Electronics">Electronics</option>
                            <option value="Beauty">Beauty</option>
                            <option value="Male Wear">Male Wear</option>
                            <option value="Female Wear">Female Wear</option>
                        </select>
                        <!-- <hr> -->
                        <h1 class="price_filter_heading">Price Filter</h1>
                        <div class="price_selector_div">
                            <select name="minimum_price" id="minimum_price" class="select">
                                <option value="0">Select:-</option>
                                <option value="1000">1000</option>
                                <option value="2000">2000</option>
                                <option value="3000">3000</option>
                                <option value="4000">4000</option>
                                <option value="5000">5000</option>
                                <option value="6000">6000</option>
                                <option value="7000">7000</option>
                                <option value="8000">8000</option>

                                <?php
                                function price($price)
                                {
                                   
                                }



                                ?>

                            </select>
                            <span>to</span>
                            <select name="maximum_price" id="maximum_price" class="select">
                                <option value="0">Select:-</option>
                                <option value="1000">1000</option>
                                <option value="2000">2000</option>
                                <option value="3000">3000</option>
                                <option value="4000">4000</option>
                                <option value="5000">5000</option>
                                <option value="6000">6000</option>
                                <option value="7000">7000</option>
                                <option value="8000">8000</option>
                                <option value="9000">90000</option>

                            </select>
                        </div>
                        <!-- <hr> -->
                        <div class="brand_selector">
                            <h1 class="brand_selector_title">Select Brand</h1>
                            <hr>
                            <div class="checkboxes">
                                <label for="brand_name">Redmi</label>
                                <input type="checkbox" name="redmi" id="redmi">
                            </div>
                            <div class="checkboxes">
                                <label for="brand_name">Realme</label>
                                <input type="checkbox" name="realme" id="realme">
                            </div>
                            <div class="checkboxes">
                                <label for="brand_name">Samsung</label>
                                <input type="checkbox" name="samsung" id="samsung">
                            </div>
                            <div class="checkboxes">
                                <label for="brand_name">Sony</label>
                                <input type="checkbox" name="sony" id="sony">
                            </div>

                        </div>
                        <div class="storage">
                            <h1 class="brand_selector_title">RAM</h1>
                            <hr>
                            <div class="checkboxes">
                                <label for="RAM">3GB</label>
                                <input type="checkbox" name="ram3gb" id="ram3gb">
                            </div>
                            <div class="checkboxes">
                                <label for="RAM">4GB</label>
                                <input type="checkbox" name="ram$gb" id="ram4gb">
                            </div>
                            <div class="checkboxes">
                                <label for="RAM">6GB</label>
                                <input type="checkbox" name="ram6gb" id="ram6gb">
                            </div>
                            <div class="checkboxes">
                                <label for="RAM">8GB</label>
                                <input type="checkbox" name="ram8gb" id="ram8gb">
                            </div>

                        </div>
                        <div class="storage">
                            <h1 class="brand_selector_title">Choose Your<br> E-commerce Site</h1>
                            <hr>
                            <div class="checkboxes">
                                <label for="e-commerce_sites">Flipkart</label>
                                <input type="checkbox" name="ram3gb" id="ram3gb">
                            </div>
                            <div class="checkboxes">
                                <label for="e-commerce_sites">Amazon</label>
                                <input type="checkbox" name="ram3gb" id="ram3gb">
                            </div>
                            <div class="checkboxes">
                                <label for="e-commerce_sites">Chroma</label>
                                <input type="checkbox" name="ram3gb" id="ram3gb">
                            </div>
                            <div class="checkboxes">
                                <label for="e-commerce_sites">Meesho</label>
                                <input type="checkbox" name="ram3gb" id="ram3gb">
                            </div>


                        </div>
                        <div class="btn"><button class="filter_btn" value="submit">Search</button></div>
                    </form>
                </div>
            </div>
            <div class="product_cards_section">


                <?php
                include "./dbconnect.php";
                global $search;
                $search = "";
                if (isset($_GET['search'])) {
                    $search = $_GET['search'];
                    // $slno=$_SESSION['product_slno'];
                    // print_product($slno);
                    print_product(null);
                } elseif (isset($_GET['minimum_price']) && isset($_GET['maximum_price'])) {
                    $minimum_price = $_GET['minimum_price'];
                    $maximum_price = $_GET['maximum_price'];
                    // echo $minimum_price . "<br>" . $maximum_price;



                    //   fetch data from product table
                    $fetch_sql = "SELECT * FROM `product`";
                    $fetch_result = mysqli_query($connection, $fetch_sql);

                    $product_price_array=array(10,50);
                    while ($num = mysqli_fetch_assoc($fetch_result)) {
                        for($i=0;$i<5;$i++){
                            echo $product_price_array[$i].",";
                        }
                        $db_price = $num['price'];
                        $slno = $num['slno'];
                        $_SESSION['product_slno']=$slno;
                        // slno($slno);
                        array_push($yhhhhh,$product_price_array);

                        $RSremovw_price = str_replace("₹", "", "$db_price");
                        $price = str_replace(",", "", "$RSremovw_price");
                        for($i=0;$i<sizeof($product_price_array);$i++){
                            echo $product_price_array[$i];
                        }
                            print_product($slno);
                        
                    }

                }
                // $result = mysqli_query($connection, $sql);
               
                echo '<h1>No More Result :)</h1>';


                ?>



                <!-- <div class="releted_items"></div> -->

            </div>
    </section>
    <script src="https://kit.fontawesome.com/37f9d47857.js" crossorigin="anonymous"></script>
    <script src="../scripts/bundle.js"></script>
    <script>
        function pageonline() {
            console.log('online')
            // window.location='./_assets/update.php?name=k'
        }
    </script>
</body>

</html>