<?php
$conn = mysqli_connect("localhost", "root", "", "ngo_media"); // yahan apna naam daalna
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>