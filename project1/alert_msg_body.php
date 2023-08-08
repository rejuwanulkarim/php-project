<?php
 $message = '<div class="sms_section" style="    background: #261e1e;
 padding: 0 6rem;
 border: 2px solid gray;
 color: gray;">
 <p class="sms_heading"  style="    font-size: 15rem;
 width: 100%;
 font-weight: bolder;
 color: blue;
 margin: auto;">Bekreta</p>
 <br><br>
 <p style="font-size:1rem;">Hi Admin,</p>
 <p style="font-size:1rem;">We have recently detected a login with a new device to your<a href="Bekreta.com"> Bekreta</a> Account.</p>
 <br><br>
 <p style="font-size:1rem;">IP Address: ' .getenv("REMOTE_ADDR") . '</p>
 <p style="font-size:1rem;width:100%;text-align:center;">If you don\'t recognize this event,please change your password and enable 2-factor authentication to make your account secure.</p>
 </div>';
 echo $message;


?>