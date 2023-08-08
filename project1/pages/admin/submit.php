<link rel="stylesheet" href="./iframe/iframe.css">

<?php

echo "  <style>
* {
    margin: 0;
    padding: 0;
}

</style>
<div class='error_body'>
<h1 class='error_heading'>404-Not Found</h1>
</div>
";



if ($deleted == true) {
echo "<div id='delete_alert'>
<div class='delete_inner_text'>
    <div class='inner_text'><b>Success!</b>Data Delete Successfully</div>
    <span id='delete_hidener'>&times;</span>
</div>
</div>

";
}

