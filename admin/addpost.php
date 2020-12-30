<?php
require "conn.php";
$title=$_POST['title'];
$detail=$_POST['details'];
$cat=$_POST['category'];
$author=$_POST['author'];
$filename=$_FILES['file']['name'];
$tmp=$_FILES['file']['tmp_name'];
$des;
$time=time();
$ext=pathinfo($filename,PATHINFO_EXTENSION);
$arr=['jpg','png','jpeg'];
if(in_array($ext,$arr))
{
    $filename =rand().".".$ext;
}
else
{
    echo "plz provide correct formate";
}
$q="select category_name from category where cid=$cat" or die("Query1 faild");
$r=mysqli_query($conn,$q);
$row=mysqli_fetch_assoc($r);
$des=$row['category_name'];
$finaldes="../pic/". $des."/";
if(file_exists($finaldes))
{
    move_uploaded_file($tmp,$finaldes.$filename);
}
else
{
    mkdir($finaldes);
    move_uploaded_file($tmp,$finaldes.$filename);
}
$q2="insert into post(title,details,date,image,author,category,time) values('$title','$detail',curdate(),'$filename',$author,$cat,$time)" or die("Query2 faild");
if(mysqli_query($conn,$q2))
{
    echo "done";
}
else
{
    echo "not done";
}
?>