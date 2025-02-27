<?php
$conn = mysqli_connect("localhost","test","test","test");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
mysqli_set_charset($conn,"utf8");

$new = mysqli_connect("localhost","testt","testt","testt");
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
mysqli_set_charset($new,"utf8");
?>