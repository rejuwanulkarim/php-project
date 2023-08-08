
<?php
$domain = "http://localhost/karim/store";
// $domain = "#";
// session_start();

if (isset($_SESSION['logedin'])) {
    $login = $_SESSION['logedin'];
    if ($login == true) {
        echo "<nav class='navbar bg-dark' style=''>
<div class='brand'>
    <a class='navbar-brand' href='#'><span>C</span><span>Zerox</span></a>
</div>
<ul class='nav-list'>";
        echo "
        <li class='nav-item'>
        <a class='item-link' id='login-home' href='./user.php'>Home</a>
        </li>
        
        <li class='nav-item'>
        <a class='item-link' id='profile' href='./profile.php'>Profile</a>
    </li>
    
    <li class='nav-item'>
        <a class='item-link' id='due-list' href='./chart.php'>Due List</a>
        </li>
    <li class='nav-item'>
        <a class='item-link' id='logout' href='./logout.php'>Logout</a>
        </li>
        ";
    }
} else {

    echo "<nav class='navbar bg-dark' style=''>
<div class='brand'>
    <a class='navbar-brand' href='$domain'><span>C</span><span>Zerox</span></a>
</div>
<ul class='nav-list'>
        <li class='nav-item'>
            <a class='item-link' id='home' href='$domain'>Home</a>
        </li>
        <li class='nav-item'>
            <a class='item-link' id='contact' href='$domain/pages/contact.php'>Contact Us</a>
        </li>
        <li class='nav-item'>
            <a class='item-link' id='about' href='$domain/pages/about.php'>About</a>
        </li>
        <li class='nav-item'>
        <a class='item-link' id='file-sender' href='$domain/pages/filesend.php'>Send File</a>
    </li>
        ";
}
echo "
    </ul>
<div class='normal-hambarger' onclick=\"this.classList.toggle('exec-hambarger'); document.getElementsByClassName('navbar')[0].classList.toggle('nav-open');\">
    <span></span>
    <span></span>
    <span></span>
</div>
</nav>";
?>

