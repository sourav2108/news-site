<?php
require "conn.php";
$fname=$_POST['fname'];
$uname=$_POST['uname'];
$pass=$_POST['pass'];
$role=$_POST['role'];
$q="insert into user(full_name,user_name,password,role) values('$fname','$uname','$pass','$role')";
if(mysqli_query($conn,$q))
{
    echo "1";
}
else
{
    echo "0";
}
?>