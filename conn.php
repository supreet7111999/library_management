<?php
$s="localhost";
$u="root";
$p="";
$d="library_management_system";
$conn=mysqli_connect($s,$u,$p,$d);
if(!$conn)
{
    die("Connection error".mysqli_connect_error());
}
?>