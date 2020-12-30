<?php
require "conn.php";
$id=$_POST['cid'];
$name=$_POST['name'];
$q="insert into category(cid,category_name) values($id,'$name')";
if(mysqli_query($conn,$q))
{
    echo "1";
}
else
{
    echo "0";
}
?>