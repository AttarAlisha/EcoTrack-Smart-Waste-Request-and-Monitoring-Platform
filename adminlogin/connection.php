<?php 
$db = new mysqli('localhost','root','','wms');
if(!$db) {
    die('Please check Your database connection'.mysqli_connect_error());
}
?>