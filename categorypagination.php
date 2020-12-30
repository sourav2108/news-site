<?php
require "conn.php";
$id=$_POST['id'];
    
$r=mysqli_query($conn,$q);
$num=mysqli_num_rows($r);
$limit=3;
$totalpage=ceil($num/$limit);
for($i=1;$i<=$totalpage;$i++)
{
    if($i==1)
    {
        echo "<li style='cursor: pointer' class='page-item active hpl'><a data-page='$i' class='page-link hp'>$i</a></li>";
    }
    else
    {
        echo "<li style='cursor: pointer' class='page-item hpl'><a data-page='$i' class='page-link hp'>$i</a></li>";
    }
        
      
}
    
?>