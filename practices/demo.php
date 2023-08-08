<!-- if ($fileType[1] == 'mkv' || $fileType[1] == 'mp4' || $fileType[1] == 'WEBM' || $fileType[1] == 'MOV' || $fileType[1] == 'AVI' || $fileType[1] == 'AVCHD' || $fileType[1] == 'HTML5' || $fileType[1] == 'F4V') {
    echo '<video src="' . $dir . '/' . $files2[$i] . '" class="images" controls></video>
    </div>
    <div class="images_downloadbar">
    <svg class="svg_logo svg_fill_red" viewBox="0 0 384 512"><path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM64 288c0-17.7 14.3-32 32-32h96c17.7 0 32 14.3 32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V288zM300.9 397.9L256 368V304l44.9-29.9c2-1.3 4.4-2.1 6.8-2.1c6.8 0 12.3 5.5 12.3 12.3V387.7c0 6.8-5.5 12.3-12.3 12.3c-2.4 0-4.8-.7-6.8-2.1z"/></svg>'; -->


<!-- } elseif ($fileType[1] == 'pdf') {
    echo '<embed src="' . $dir . '/' . $files2[$i] . '" class="images" controls></video>
    </div>
    <div class="images_downloadbar">
    <svg class="svg_logo svg_fill_red" viewBox="0 0 384 512"><path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM64 224H88c30.9 0 56 25.1 56 56s-25.1 56-56 56H80v32c0 8.8-7.2 16-16 16s-16-7.2-16-16V320 240c0-8.8 7.2-16 16-16zm24 80c13.3 0 24-10.7 24-24s-10.7-24-24-24H80v48h8zm72-64c0-8.8 7.2-16 16-16h24c26.5 0 48 21.5 48 48v64c0 26.5-21.5 48-48 48H176c-8.8 0-16-7.2-16-16V240zm32 112h8c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16h-8v96zm96-128h48c8.8 0 16 7.2 16 16s-7.2 16-16 16H304v32h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H304v48c0 8.8-7.2 16-16 16s-16-7.2-16-16V304 240c0-8.8 7.2-16 16-16z"/></svg>';
 -->
<!-- 
} else {
    echo ' <img src="./' .$dir.'' . $files2[$i] . '" alt="" class="images">
    </div>
    <div class="images_downloadbar">
    <svg xmlns="http://www.w3.org/2000/svg" class="svg_logo svg_fill_red" viewBox="0 0 384 512">
    <path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM128 256c0 17.7-14.3 32-32 32s-32-14.3-32-32s14.3-32 32-32s32 14.3 32 32zm88 32c5.3 0 10.2 2.6 13.2 6.9l88 128c3.4 4.9 3.7 11.3 1 16.5s-8.2 8.6-14.2 8.6H216 176 128 80c-5.8 0-11.1-3.1-13.9-8.1s-2.8-11.2 .2-16.1l48-80c2.9-4.8 8.1-7.8 13.7-7.8s10.8 2.9 13.7 7.8l12.8 21.4 48.3-70.2c3-4.3 7.9-6.9 13.2-6.9z" />
</svg>
    ';
}



echo ' -->
<link rel="stylesheet" href="style.css">
<div class="images_body">

    <div class="images">

        <span class="delete_btn"><a href="?delete=no">Delete</a></span>
        <span class="full_screen_btn"><a href="picture.jpg" target="_blank">Full</a></span>
        <img src="picture.jpg" alt="" class="images">
    </div>
    <div class="images_downloadbar">
        <svg xmlns="http://www.w3.org/2000/svg" class="svg_logo svg_fill_red" viewBox="0 0 384 512">
            <path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM128 256c0 17.7-14.3 32-32 32s-32-14.3-32-32s14.3-32 32-32s32 14.3 32 32zm88 32c5.3 0 10.2 2.6 13.2 6.9l88 128c3.4 4.9 3.7 11.3 1 16.5s-8.2 8.6-14.2 8.6H216 176 128 80c-5.8 0-11.1-3.1-13.9-8.1s-2.8-11.2 .2-16.1l48-80c2.9-4.8 8.1-7.8 13.7-7.8s10.8 2.9 13.7 7.8l12.8 21.4 48.3-70.2c3-4.3 7.9-6.9 13.2-6.9z" />
        </svg>
        <span class="image_name">Picture.jpg</span>
        <a href="">
            <svg class="svg_logo pointer svg_fill_red" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zM432 456c-13.3 0   -24-10.7-24-24s10.7-24 24-24s24 10.7 24 24s-10.7 24-24 24z" />
            </svg>
        </a>
    </div>
</div>
<div class="images_body">

    <div class="images">

        <span class="delete_btn">Delete</span>
        <span class="full_screen_btn">Full</span>
        <img src="picture.jpg" alt="" class="images">
    </div>
    <div class="images_downloadbar">
        <svg xmlns="http://www.w3.org/2000/svg" class="svg_logo svg_fill_red" viewBox="0 0 384 512">
            <path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM128 256c0 17.7-14.3 32-32 32s-32-14.3-32-32s14.3-32 32-32s32 14.3 32 32zm88 32c5.3 0 10.2 2.6 13.2 6.9l88 128c3.4 4.9 3.7 11.3 1 16.5s-8.2 8.6-14.2 8.6H216 176 128 80c-5.8 0-11.1-3.1-13.9-8.1s-2.8-11.2 .2-16.1l48-80c2.9-4.8 8.1-7.8 13.7-7.8s10.8 2.9 13.7 7.8l12.8 21.4 48.3-70.2c3-4.3 7.9-6.9 13.2-6.9z" />
        </svg>





        <span class="image_name">Picture.jpg</span>
        <a href="">
            <svg class="svg_logo pointer svg_fill_red" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zM432 456c-13.3 0   -24-10.7-24-24s10.7-24 24-24s24 10.7 24 24s-10.7 24-24 24z" />
            </svg>
        </a>
    </div>
</div>
<div class="images_body">

    <div class="images">

        <span class="delete_btn">Delete</span>
        <span class="full_screen_btn">Full</span>
        <img src="picture.jpg" alt="" class="images">
    </div>
    <div class="images_downloadbar">
        <svg xmlns="http://www.w3.org/2000/svg" class="svg_logo svg_fill_red" viewBox="0 0 384 512">
            <path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM128 256c0 17.7-14.3 32-32 32s-32-14.3-32-32s14.3-32 32-32s32 14.3 32 32zm88 32c5.3 0 10.2 2.6 13.2 6.9l88 128c3.4 4.9 3.7 11.3 1 16.5s-8.2 8.6-14.2 8.6H216 176 128 80c-5.8 0-11.1-3.1-13.9-8.1s-2.8-11.2 .2-16.1l48-80c2.9-4.8 8.1-7.8 13.7-7.8s10.8 2.9 13.7 7.8l12.8 21.4 48.3-70.2c3-4.3 7.9-6.9 13.2-6.9z" />
        </svg>





        <span class="image_name">Picture.jpg</span>
        <a href="">
            <svg class="svg_logo pointer svg_fill_red" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zM432 456c-13.3 0   -24-10.7-24-24s10.7-24 24-24s24 10.7 24 24s-10.7 24-24 24z" />
            </svg>
        </a>
    </div>
</div>
<div class="images_body">

    <div class="images">

        <span class="delete_btn">Delete</span>
        <span class="full_screen_btn">Full</span>
        <img src="picture.jpg" alt="" class="images">
    </div>
    <div class="images_downloadbar">
        <svg xmlns="http://www.w3.org/2000/svg" class="svg_logo svg_fill_red" viewBox="0 0 384 512">
            <path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM128 256c0 17.7-14.3 32-32 32s-32-14.3-32-32s14.3-32 32-32s32 14.3 32 32zm88 32c5.3 0 10.2 2.6 13.2 6.9l88 128c3.4 4.9 3.7 11.3 1 16.5s-8.2 8.6-14.2 8.6H216 176 128 80c-5.8 0-11.1-3.1-13.9-8.1s-2.8-11.2 .2-16.1l48-80c2.9-4.8 8.1-7.8 13.7-7.8s10.8 2.9 13.7 7.8l12.8 21.4 48.3-70.2c3-4.3 7.9-6.9 13.2-6.9z" />
        </svg>





        <span class="image_name">Picture.jpg</span>
        <a href="">
            <svg class="svg_logo pointer svg_fill_red" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zM432 456c-13.3 0   -24-10.7-24-24s10.7-24 24-24s24 10.7 24 24s-10.7 24-24 24z" />
            </svg>
        </a>
    </div>
</div>
<div class="images_body">

    <div class="images">

        <span class="delete_btn">Delete</span>
        <span class="full_screen_btn">Full</span>
        <img src="picture.jpg" alt="" class="images">
    </div>
    <div class="images_downloadbar">
        <svg xmlns="http://www.w3.org/2000/svg" class="svg_logo svg_fill_red" viewBox="0 0 384 512">
            <path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM128 256c0 17.7-14.3 32-32 32s-32-14.3-32-32s14.3-32 32-32s32 14.3 32 32zm88 32c5.3 0 10.2 2.6 13.2 6.9l88 128c3.4 4.9 3.7 11.3 1 16.5s-8.2 8.6-14.2 8.6H216 176 128 80c-5.8 0-11.1-3.1-13.9-8.1s-2.8-11.2 .2-16.1l48-80c2.9-4.8 8.1-7.8 13.7-7.8s10.8 2.9 13.7 7.8l12.8 21.4 48.3-70.2c3-4.3 7.9-6.9 13.2-6.9z" />
        </svg>





        <span class="image_name">Picture.jpg</span>
        <a href="">
            <svg class="svg_logo pointer svg_fill_red" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zM432 456c-13.3 0   -24-10.7-24-24s10.7-24 24-24s24 10.7 24 24s-10.7 24-24 24z" />
            </svg>
        </a>
    </div>
</div>
<!-- ';
// echo <br>";
}
}
} -->