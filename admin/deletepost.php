<?php
require "conn.php";
$pid=$_POST['id'];

$q="delete from post where pid=$pid";
if(mysqli_query($conn,$q))
{
    echo "1";
}
else
{
    echo "0";
}
?>