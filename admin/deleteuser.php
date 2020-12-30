<?php
require "conn.php";
$id=$_POST['uid'];

$q="delete from user where uid=$id";
if(mysqli_query($conn,$q))
{
    echo "1";
}
else
{
    echo "0";
}
?>