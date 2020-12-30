<?php
require "conn.php";
$id=$_POST['id'];
$q;
if($id==100)
{
    $q="select * from post";
}
else
{
    $q="select * from post where category=$id";
}

$r=mysqli_query($conn,$q);
$num=mysqli_num_rows($r);
$limit=3;
$totalpage=ceil($num/$limit);
for($i=1;$i<=$totalpage;$i++)
{
    if($i==1)
    {
        echo "<li style='cursor: pointer' class='page-item active'><a data-page='$i' class='page-link hp'>$i</a></li>";
    }
    else
    {
        echo "<li style='cursor: pointer' class='page-item'><a data-page='$i' class='page-link hp'>$i</a></li>";
    }
        
      
}
    
?>