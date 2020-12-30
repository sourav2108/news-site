<?php
require "conn.php";
$id=$_POST['cid'];

$q="delete from category where cid=$id";
if(mysqli_query($conn,$q))
{
    echo "1";
}
else
{
    echo "0";
}
?>