<?php
session_start();
require "conn.php";
$name=$_POST['uname'];
$pass=$_POST['pass'];

$a=$conn->prepare("select * from user where user_name=? and password=?");
$a->bind_param("ss",$name,$pass);
$a->execute();
$r=$a->get_result();
if($r->num_rows>0)
{
    $ans=$r->fetch_assoc();

    $_SESSION['username']=$ans['full_name'];
    $_SESSION['role']=$ans['role'];
    
    session_regenerate_id(false);
    echo "1";
}
else
{
    echo "0";
}
?>