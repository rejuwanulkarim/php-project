<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/navbar.css">
    <link rel="stylesheet" href="../assets/footer.css">
    <link rel="stylesheet" href="../assets/main.css">
    <link rel="stylesheet" href="../assets/notice.css">
    <link rel="stylesheet" href="../assets/phone.css">
    <title>JHM->Notice</title>
</head>

<body pagename="notice">
    <?php
    require "./navbar.php";
    ?>


    <section class="notice_section">
        <h4 class="notice_heading">Notice Board</h4>
        <div class="notice_body">
            <div class="notice_type_slider">
                <ul class="notice_ul">
                    <li class="notice_list"><a href="#" class="sub_anchor">Genarel</a></li>
                    <li class="notice_list"><a href="#" class="sub_anchor">Poletics</a></li>
                    <li class="notice_list"><a href="#" class="sub_anchor">Holidays</a></li>
                    <li class="notice_list"><a href="#" class="sub_anchor">Others</a></li>


                </ul>
                <!-- </marquee> -->

                <div class="notice_slider">
                    <!-- <a href="#" class="notices">Notice title</a> -->
                    <table class="notice_table">
                        <thead>
                            <tr>

                                <th>Slno.</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php
                        // require "../dbconnect.php";
                        class noticeDate
                        {
                            function tabledata($data = "")
                            {
                                $slno = 0;
                                if ($data == "") {
                                    $connection = mysqli_connect("localhost", "root", "", "schooldb");
                                    $sql = "SELECT * FROM `notices` ORDER BY `date` DESC";
                                    $result = mysqli_query($connection, $sql);
                                    if ($num = mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $title = $row['title'];
                                            $subtitle = $row['subtitle'];
                                            $filetype = $row['filetype'];
                                            $date = $row['date'];
                                            parse_str($subtitle, $parse_name);
                                            $subtitle = str_replace("_", " ", $subtitle);
                                            $slno += 1;
                                            echo "    <tr>
                                                <td>$slno</td>
                                                <td>$title</td>
                                                <td>$date</td>
                                                <td><a href='http://localhost/karim/school web/admin/classes/images/notice/$subtitle.$filetype' download='$title.$filetype'>Download</a></td>
                                            </tr>";
                                        }
                                    } else {
                                        echo "<tr>
                                        <td  colspan='4' text-align='center'>Update Very Soon:)</td>
                                        </tr>";
                                    }
                                }
                            }
                        }
                        $table = new noticeDate;
                        echo $table->tabledata();
                        ?>



                    </table>
                </div>

            </div>
        </div>
    </section>



    <!-- Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione perferendis rem amet voluptas corrupti in cum ipsa? Hic, laudantium officia -->

    <?php
    require "./footer.php";
    ?>
    <script>
        let pagename = document.getElementsByTagName('body')[0].getAttribute('pagename')
        let navbar = document.getElementsByClassName('nav-item')

        for (let j = 0; j < navbar.length; j++) {
            let navid = navbar[j].children[0].id
            if (navid == pagename) {
                document.getElementById(pagename).setAttribute('class', 'nav-link active')
            }
        }
    </script>

    <script src="../assets/bundle.js"></script>
</body>

</html>