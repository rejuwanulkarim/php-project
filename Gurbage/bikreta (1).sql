-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2023 at 12:46 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bikreta`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `slno` int(11) NOT NULL,
  `producttype` varchar(100) NOT NULL,
  `sitename` varchar(100) NOT NULL,
  `producttitle` varchar(100) NOT NULL,
  `productlink` varchar(500) NOT NULL,
  `price` varchar(200) NOT NULL,
  `image_url` varchar(500) NOT NULL,
  `details` varchar(1000) NOT NULL,
  `brand_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`slno`, `producttype`, `sitename`, `producttitle`, `productlink`, `price`, `image_url`, `details`, `brand_name`) VALUES
(8, 'Electrinics', 'flipkart', '<span class=\"B_NuCI\">Lakmé 9TO5 Primer + Matte Lip Color Peachy Affair<!-- -->  (Peachy Affair, 3.6 ', 'https://www.flipkart.com/lakm-9to5-primer-matte-lip-color-peachy-affair/p/itmd49220be4dfa0?pid=LSKGFVHMMBTFXGJQ&lid=LSTLSKGFVHMMBTFXGJQLSOOQX&marketplace=FLIPKART&q=lipstick&store=g9b%2Fffi%2Ftv5%2Funa&srno=s_1_1&otracker=AS_QueryStore_OrganicAutoSuggest_1_3_na_na_na&otracker1=AS_QueryStore_OrganicAutoSuggest_1_3_na_na_na&fm=search-autosuggest&iid=en_Iboc2dP8j3wHomr2lbj43zaFy1GsGrMYAMkC9FbKaJxi3Lm2AaSBIwijxh4Lr0BXtLf7zlVm8GfO0p9Q4u%2BemA%3D%3D&ppt=sp&ppn=sp&ssid=x32mx7vrkg0000001666523883239&qH=', '₹399', 'https://rukminim2.flixcart.com/image/416/416/kn6cxow0/lipstick/9/w/f/3-6-9to5-primer-matte-lip-color-peachy-affair-lakme-original-imagfwtcqhpfxcuu.jpeg?q=70', '<li class=\"_21Ahn-\">Gives a Matte finish look</li><li class=\"_21Ahn-\">Texture is: Cream</li><li class=\"_21Ahn-\">Quantity: 3.6 g</li>', ''),
(58, 'Electrinics', 'flipkart', '<span class=\"B_NuCI\">Hero HF Deluxe (Self Start) Booking for Ex-showroom Price<!-- -->  (Black Grey)', 'https://www.flipkart.com/hero-hf-deluxe-self-start/p/itm445463cf70da6?pid=EBKGKRVGPEHSWKPB&lid=LSTEBKGKRVGPEHSWKPBFD0R3P&marketplace=FLIPKART&fm=neo%2Fmerchandising&iid=M_c7081609-49ee-4a81-8a90-efccafa309f1_1_ELTY70FEJGI1_MC.EBKGKRVGPEHSWKPB&ssid=502beyx5000000001672657348809&otracker=clp_pmu_v2_Bikes%2B%2526%2BScooters_2_1.productCard.PMU_V2_Hero%2BHF%2BDeluxe%2B%2528Self%2BStart%2529_two-wheelers-store_EBKGKRVGPEHSWKPB_neo%2Fmerchandising_1&otracker1=clp_pmu_v2_PINNED_neo%2Fmerchandising_Bike', '₹66,258', 'https://rukminim2.flixcart.com/image/416/416/xif0q/electric-bike-scooter/w/x/c/-original-imaghfe68febqydz.jpeg?q=70', '<li class=\"_21Ahn-\">Maximum Power: 7.91</li><li class=\"_21Ahn-\">Displacement: 97.22 cc</li><li class=\"_21Ahn-\">Brake Front: Drum</li><li class=\"_21Ahn-\">Tire Type: Tubed</li><li class=\"_21Ahn-\">Console Feature: Speedometer</li>', ''),
(59, 'Electronics', 'flipkart', '<span class=\"B_NuCI\">REDMI 9i Sport (Metallic Blue, 64 GB)<!-- -->  (4 GB RAM)</span>', 'https://www.flipkart.com/redmi-9i-sport-metallic-blue-64-gb/p/itmeb95d0b4616cc?pid=MOBG6WQWQZZMGQCU&lid=LSTMOBG6WQWQZZMGQCUXA6EPW&marketplace=FLIPKART&q=redmi&store=tyy%2F4io&srno=s_1_1&otracker=search&otracker1=search&iid=4ea5d9ff-6b10-4c2c-a878-43512f1a173a.MOBG6WQWQZZMGQCU.SEARCH&ssid=5if6ok88u80000001672665759109&qH=9b6bf0057c19bd94', '₹7,399', 'https://rukminim2.flixcart.com/image/416/416/ku04o7k0/mobile/x/x/t/9i-sport-mzb0a10in-redmi-original-imag785rwf3q8sft.jpeg?q=70', '<li class=\"_21Ahn-\">4 GB RAM | 64 GB ROM | Expandable Upto 512 GB</li><li class=\"_21Ahn-\">16.59 cm (6.53 inch) HD+ Display</li><li class=\"_21Ahn-\">13MP Rear Camera | 5MP Front Camera</li><li class=\"_21Ahn-\">5000 mAh Li-Polymer Battery</li><li class=\"_21Ahn-\">MediaTek Helio G25 Processor</li>', ''),
(60, 'jeem', 'flipkart', '<span class=\"B_NuCI\">YFMATS 10 MM-(GREY)100% EVA ANTI SKID Light Weight GREY YOGA MAT WITH CARRY STR', 'https://www.flipkart.com/yfmats-10-mm-grey-100-eva-anti-skid-light-weight-grey-yoga-mat-carry-strap-mm/p/itm2d0725f266bb2?pid=SMTFATRSPUR4YBVG&lid=LSTSMTFATRSPUR4YBVGHYSAB1&marketplace=FLIPKART&store=qoc%2Fs1h%2Ffco&srno=b_1_1&otracker=hp_omu_Beauty%252C%2BFood%252C%2BToys%2B%2526%2Bmore_2_6.dealCard.OMU_50C9Q9GJFUFN_4&otracker1=hp_omu_PINNED_neo%2Fmerchandising_Beauty%252C%2BFood%252C%2BToys%2B%2526%2Bmore_NA_dealCard_cc_2_NA_view-all_4&fm=organic&iid=en_BzhlLCN5bKxte03o%2Fk8H0HhhgQzRlzTYwTrqzx', '₹483', 'https://rukminim2.flixcart.com/image/416/416/xif0q/sport-mat/x/8/d/4mm-grey-100-eva-anti-skid-light-weight-grey-yoga-mat-with-carry-original-imagr2u2gyqwnmfa.jpeg?q=70', '<li class=\"_21Ahn-\">Type: Yoga</li><li class=\"_21Ahn-\">Thickness: 10 mm</li><li class=\"_21Ahn-\">Reversible</li><li class=\"_21Ahn-\">Slip Resistant</li>', ''),
(61, 'kids', 'flipkart', '<span class=\"B_NuCI\">BBS DEAL Combo (33 Each x 7=231 Nakli Note) Playing Indian Currency Notes for F', 'https://www.flipkart.com/bbs-deal-combo-33-each-x-7-231-nakli-note-playing-indian-currency-notes-fun-paper-kids-churan-wale-note-note-10-20-50-100-200-500-2000-gag-toy-fake/p/itm5b1a0772e7993?pid=GTOGY6VBVMVYZGHH&lid=LSTGTOGY6VBVMVYZGHH0WERZG&marketplace=FLIPKART&store=tng%2Fsv3&srno=b_1_1&otracker=hp_omu_Beauty%252C%2BFood%252C%2BToys%2B%2526%2Bmore_3_6.dealCard.OMU_E6ABSCK1PFW6_4&otracker1=hp_omu_PINNED_neo%2Fmerchandising_Beauty%252C%2BFood%252C%2BToys%2B%2526%2Bmore_NA_dealCard_cc_3_NA_view-', '₹179', 'https://rukminim2.flixcart.com/image/416/416/kqgyhe80/gag-toy/5/v/l/children-banks-style-mania-combo-20-each-x-7-140-nakli-note-original-imag4gxfnhjkcdyg.jpeg?q=70', '<li class=\"_21Ahn-\">Fake/Dummy Note</li><li class=\"_21Ahn-\">Increse Learning skill</li><li class=\"_21Ahn-\">Creativity skills</li><li class=\"_21Ahn-\">Counting skills</li>', ''),
(62, 'kids', 'flipkart', '<span class=\"B_NuCI\">Aarna Manual Soft Bullet Shooting Pistol Toy Gun Guns &amp; Darts<!-- -->  (Mul', 'https://www.flipkart.com/aarna-manual-soft-bullet-shooting-pistol-toy-gun-guns-darts/p/itmfg9y6kkg2azyp?pid=TWPFG8XFTHRKMNPJ&lid=LSTTWPFG8XFTHRKMNPJDNPE48&marketplace=FLIPKART&store=tng%2Fsv3&srno=b_1_2&otracker=hp_omu_Beauty%252C%2BFood%252C%2BToys%2B%2526%2Bmore_3_6.dealCard.OMU_E6ABSCK1PFW6_4&otracker1=hp_omu_PINNED_neo%2Fmerchandising_Beauty%252C%2BFood%252C%2BToys%2B%2526%2Bmore_NA_dealCard_cc_3_NA_view-all_4&fm=organic&iid=dbce0c99-6f65-4635-b34a-6d37573d6b89.TWPFG8XFTHRKMNPJ.SEARCH&ppt=No', '₹211', 'https://rukminim2.flixcart.com/image/416/416/jwaztzk0/toy-weapon/u/r/u/hot-fire-soft-bullet-toy-gun-7036-bluekart-online-original-imafdpffqutx3jch.jpeg?q=70', '<li class=\"_21Ahn-\">ABS Plastic, Rubber Material</li><li class=\"_21Ahn-\">Non Battery Operated</li><li class=\"_21Ahn-\">Non Rechargeable Batteries</li><li class=\"_21Ahn-\">Age: 3+ Years</li>', ''),
(63, 'Electronics', 'flipkart', '<span class=\"B_NuCI\">PHILIPS HP8100/46 Hair Dryer<!-- -->  (1000 W, Purple)</span>', 'https://www.flipkart.com/philips-hp8100-46-hair-dryer/p/itmfhbrgkk38zkfz?pid=HDRDW3SEFGZ6BCTG&lid=LSTHDRDW3SEFGZ6BCTGSMUTVI&marketplace=FLIPKART&store=zlw&srno=b_1_1&otracker=hp_omu_Best%2Bof%2BElectronics_2_3.dealCard.OMU_VXQGYLXW75FQ_3&otracker1=hp_omu_PINNED_neo%2Fmerchandising_Best%2Bof%2BElectronics_NA_dealCard_cc_2_NA_view-all_3&iid=8606efc5-2a47-498f-901e-3329664026ae.HDRDW3SEFGZ6BCTG.SEARCH&ssid=mvmk9k68u80000001672848829783', '₹799', 'https://rukminim2.flixcart.com/image/416/416/ju79hu80/hair-dryer-refurbished/c/p/e/c-hp8100-46-philips-original-imaf8dvrv4zekkgt.jpeg?q=70', '<li class=\"_21Ahn-\">2 flexible speed settings</li><li class=\"_21Ahn-\">Advanced concentrator technology</li><li class=\"_21Ahn-\">Compact design for easy handling</li><li class=\"_21Ahn-\">2 heat settings</li><li class=\"_21Ahn-\">2 speed settings</li><li class=\"_21Ahn-\">Wattage: 1000 W</li><li class=\"_21Ahn-\">1.5 m cord length</li>', ''),
(64, 'kids', 'flipkart', '<span class=\"B_NuCI\">LYCAN Junior Cricket Bat Size 3 For Age Group 8 Years PVC/Plastic Cricket  Bat<', 'https://www.flipkart.com/lycan-junior-cricket-bat-size-3-age-group-8-years-pvc-plastic/p/itmf7dcb1fba3e96?pid=BATG7XFPTYFQX7UF&lid=LSTBATG7XFPTYFQX7UFKVUZPQ&marketplace=FLIPKART&q=bat&store=abc%2F5lf&srno=s_1_1&otracker=search&otracker1=search&fm=organic&iid=ca918389-a720-4e58-8d5e-da89a9f331a7.BATG7XFPTYFQX7UF.SEARCH&ppt=pp&ppn=pp&ssid=cqqe4cvig00000001673600039216&qH=5f3f4681121b460e', '₹199', 'https://rukminim2.flixcart.com/image/416/416/xif0q/bat/p/g/w/400-junior-cricket-bat-size-3-for-age-group-8-years-3-junior-3-original-imagp8ugqssdmruc.jpeg?q=70', '<li class=\"_21Ahn-\">Age Group 8 Yrs</li><li class=\"_21Ahn-\">Blade Made of PVC/Plastic</li><li class=\"_21Ahn-\">Beginner Playing Level</li><li class=\"_21Ahn-\">Bat Grade: Grade 1</li><li class=\"_21Ahn-\">Sport Type: Cricket</li><li class=\"_21Ahn-\">Weight Range 400 g</li>', ''),
(65, 'Electronics', 'flipkart', '<span class=\"B_NuCI\">APPLE iPhone 12 (Black, 64 GB)</span>', 'https://www.flipkart.com/apple-iphone-12-black-64-gb/p/itma2559422bf7c7?pid=MOBFWBYZU5FWK2VP&lid=LSTMOBFWBYZU5FWK2VPFMEI56&marketplace=FLIPKART&q=iphone+12&store=tyy%2F4io&srno=s_1_1&otracker=AS_QueryStore_OrganicAutoSuggest_1_6_na_na_na&otracker1=AS_QueryStore_OrganicAutoSuggest_1_6_na_na_na&fm=organic&iid=e1269e4c-fbd9-4ec5-8eea-1aa645812a27.MOBFWBYZU5FWK2VP.SEARCH&ppt=hp&ppn=homepage&ssid=6m5xglt2v40000001677441721072&qH=7b7504afcaf2e1ea', '₹53,999', 'https://rukminim2.flixcart.com/image/416/416/kg8avm80/mobile/r/h/z/apple-iphone-12-dummyapplefsn-original-imafwg8duby8qbn4.jpeg?q=70', '<li class=\"_21Ahn-\">64 GB ROM</li><li class=\"_21Ahn-\">15.49 cm (6.1 inch) Super Retina XDR Display</li><li class=\"_21Ahn-\">12MP + 12MP | 12MP Front Camera</li><li class=\"_21Ahn-\">A14 Bionic Chip with Next Generation Neural Engine Processor</li><li class=\"_21Ahn-\">Ceramic Shield</li><li class=\"_21Ahn-\">Industry-leading IP68 Water Resistance</li><li class=\"_21Ahn-\">All Screen OLED Display</li><li class=\"_21Ahn-\">12MP TrueDepth Front Camera with Night Mode, 4K Dolby Vision HDR Recording</li>', ''),
(66, 'tv', 'flipkart', '<span class=\"B_NuCI\">SAMSUNG 24 inch Full HD LED Backlit IPS Panel with 3-Sided Borderless Display, ', 'https://www.flipkart.com/samsung-24-inch-full-hd-led-backlit-ips-panel-3-sided-borderless-display-game-free-sync-mode-eye-saver-mode-flicker-monitor-ls24c310eawxxl-lf24t350fhwxxl/p/itm57a80d5c9cb0f?pid=MONFYGGACKSJX4MS&lid=LSTMONFYGGACKSJX4MSSUIOO3&marketplace=FLIPKART&store=6bo%2Fg0i%2F9no&spotlightTagId=TrendingId_6bo%2F9no&srno=b_1_3&otracker=hp_omu_Best%2Bof%2BElectronics_3_3.dealCard.OMU_W52Y6O5JCN9E_3&otracker1=hp_rich_navigation_PINNED_neo%2Fmerchandising_NA_NAV_EXPANDABLE_navigationCard_', '₹8,999', 'https://rukminim2.flixcart.com/image/416/416/l5ld8y80/monitor/l/k/s/-original-imagg897ufhyvwqq.jpeg?q=70', '<li class=\"_21Ahn-\">Panel Type: IPS Panel</li><li class=\"_21Ahn-\">Screen Resolution Type: Full HD</li><li class=\"_21Ahn-\">Brightness: 250 nits</li><li class=\"_21Ahn-\">Response Time: 5 ms | Refresh Rate: 75 Hz</li><li class=\"_21Ahn-\">HDMI Ports - 1</li>', ''),
(67, 'electronics', 'flipkart', '<span class=\"B_NuCI\">POCO M2 Pro (Green and Greener, 64 GB)<!-- -->  (4 GB RAM)</span>', 'https://www.flipkart.com/poco-m2-pro-green-greener-64-gb/p/itm5de3b6eb57ab4?pid=MOBFT7MKFHTAPDYD&lid=LSTMOBFT7MKFHTAPDYDNCICXM&marketplace=FLIPKART&q=pocom2+pro&store=tyy%2F4io&srno=s_1_1&otracker=search&otracker1=search&fm=neo%2Fmerchandising&iid=5e047b65-bbc5-4617-a6e4-3279dc7c8439.MOBFT7MKFHTAPDYD.SEARCH&ppt=pp&ppn=pp&ssid=3q0h8jlhxc0000001689353044023&qH=d42aee535df2a825', '₹16,999', 'https://rukminim2.flixcart.com/image/416/416/kcauaa80/mobile/c/w/a/poco-m2-pro-mzb9625in-original-imaftga2ytmnt7ac.jpeg?q=70', '<li class=\"_21Ahn-\">4 GB RAM | 64 GB ROM | Expandable Upto 512 GB</li><li class=\"_21Ahn-\">16.94 cm (6.67 inch) Full HD+ Display</li><li class=\"_21Ahn-\">48MP + 8MP + 5MP + 2MP | 16MP Front Camera</li><li class=\"_21Ahn-\">5000 mAh Lithium-ion Polymer Battery</li><li class=\"_21Ahn-\">Qualcomm Snapdragon 720G Processor</li>', '');

-- --------------------------------------------------------

--
-- Table structure for table `product_urls`
--

CREATE TABLE `product_urls` (
  `slno` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `producturl` varchar(500) NOT NULL,
  `sitename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_urls`
--

INSERT INTO `product_urls` (`slno`, `date`, `producturl`, `sitename`) VALUES
(1, '2022-10-23 07:07:24', 'https://www.flipkart.com/redmi-note-10-pro-vintage-bronze-128-gb/p/itmb4b28cb04dce7?pid=MOBGB725PZQYDN4D&lid=LSTMOBGB725PZQYDN4D6D3DUF&marketplace=FLIPKART&q=redmi+note+10+pro&store=tyy%2F4io&srno=s_1_1&otracker=AS_QueryStore_OrganicAutoSuggest_1_3_na_na_na&otracker1=AS_QueryStore_OrganicAutoSuggest_1_3_na_na_na&fm=organic&iid=32b8d99c-a6d5-4a5b-91ef-1440e0cef48f.MOBGB725PZQYDN4D.SEARCH&ppt=hp&ppn=homepage&ssid=8h9xj8tfcw0000001666063683811&qH=20ef7d326dcad8f3h', 'flipkarth'),
(7, '2022-10-21 14:45:16', 'https://www.flipkart.com/samsung-galaxy-f13-nightsky-green-64-gb/p/itmeadfda1bd23fa?pid=MOBGENJWF4KJTPEN&lid=LSTMOBGENJWF4KJTPENAUQVSZ&marketplace=FLIPKART&store=tyy%2F4io&srno=b_1_2&otracker=hp_banner_1_4.bannerX3.BANNER_EOQP54PFFXYP&fm=neo%2Fmerchandising&iid=da8fc73d-a478-4220-83d1-a73b08c880f7.MOBGENJWF4KJTPEN.SEARCH&ppt=hp&ppn=homepage&ssid=wi76m2aaa80000001666363461913', 'flipkart');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `slno` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phoneno` varchar(40) NOT NULL,
  `gmail` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `cause` varchar(100) NOT NULL,
  `admin_power` int(11) NOT NULL,
  `otp` varchar(10) NOT NULL,
  `alert` varchar(1) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`slno`, `name`, `phoneno`, `gmail`, `username`, `password`, `cause`, `admin_power`, `otp`, `alert`, `status`) VALUES
(37, 'test', '8388987612', 'demo@gmail.com', '1', '$2y$10$y8VC7tGf4fswpwx0AIbPOOqS/F2uiOI71QGgYOc3IVMfvG0XHkoz6', 'for admin', 0, '1', '0', 'true '),
(46, 'admin', '7478919026', 'rejuwanulkarim@gmail.com', 'admin', '$2y$10$7NPOpODW00zfXD9rTsZdaudC8ZCpJm7FogwSL1kJBx.lvj0I4woOS', 'admin', 1, '1', '1', 'true ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `product_urls`
--
ALTER TABLE `product_urls`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`slno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `product_urls`
--
ALTER TABLE `product_urls`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
