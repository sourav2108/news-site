<?php
require "conn.php";

$q="select * from post";

$r=mysqli_query($conn,$q);
$num=mysqli_num_rows($r);
$limit=5;
$totalpage=ceil($num/$limit);
for($i=1;$i<=$totalpage;$i++)
{
    if($i==1)
    {
        echo "<li style='cursor: pointer' class='page-item active '><a data-page='$i' class='page-link ap'>$i</a></li>";
    }
    else
    {
        echo "<li style='cursor: pointer' class='page-item'><a data-page='$i' class='page-link ap'>$i</a></li>";
    }
        
      
}
    
?>