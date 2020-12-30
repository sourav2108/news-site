<?php
require "conn.php";
$id=$_POST['edituid'];
$fname=$_POST['editfname'];
$uname=$_POST['edituname'];
$pass=$_POST['editpass'];
$role=$_POST['editrole'];

$q="update user set full_name='$fname',user_name='$uname',password='$pass',role='$role' where uid=$id";
if(mysqli_query($conn,$q))
{
    echo "1";
}
else
{
    echo "0";
}

?>