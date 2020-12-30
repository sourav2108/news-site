<?php
require "conn.php";
$title=$_POST['edittitle'];
$detail=$_POST['editdesc'];
$pid=$_POST['editpid'];
$cat=$_POST['editcat'];
$filename=$_FILES['editfile']['name'];
$tmp=$_FILES['editfile']['tmp_name'];
$prevfilename=$_POST['prevfile'];
$des;
$time=time();
if(!empty($filename))
{
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
    $q="select category_name from category where cid=$cat";
    $r=mysqli_query($conn,$q);
    $row=mysqli_fetch_assoc($r);
    $des=$row['category_name'];
    $finaldes="pic/". $des."/";
    unlink($finaldes.$prevfilename);
    if(file_exists($finaldes))
    {
        move_uploaded_file($tmp,$finaldes.$filename);
    }
    else
    {
        mkdir($finaldes);
        move_uploaded_file($tmp,$finaldes.$filename);
    }
}
else
{
    $filename=$prevfilename;
}

$q2="update post set title='$title',details='$detail',date=curdate(),image='$filename',time=$time where pid=$pid";
if(mysqli_query($conn,$q2))
{
    echo "done";
}
else
{
    echo "not done";
}
?>