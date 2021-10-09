<?php

// Check if image file is a actual image or fake image

if(isset($_POST["submit"])) {
$file =$_FILES['file'];
print_r($file);
$fileName = $_FILES['file']['name'];
}
?>  