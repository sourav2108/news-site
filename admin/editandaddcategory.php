<?php
require "conn.php";
$id=$_POST['cid'];
$name=$_POST['name'];

$q="update category set category_name='$name' where cid=$id";
if(mysqli_query($conn,$q))
{
    echo "1";
}
else
{
    echo "0";
}

?>