<?php 
$con = mysqli_connect('localhost', 'root', '', 'wms');
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>