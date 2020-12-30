<?php
require "conn.php";
$data=$_POST['item'];
if(!empty($data))
{
    $q1="select * from post where title like '%$data%'";

    $r1=mysqli_query($conn,$q1);
    $num1=mysqli_num_rows($r1);
    $limit=3;
    $totalpage=ceil($num1/$limit);
    for($i=1;$i<=$totalpage;$i++)
    {
        if($i==1)
        {
            echo "<li style='cursor: pointer' class='page-item active '><a data-page='$i' class='page-link scr'>$i</a></li>";
        }
        else
        {
            echo "<li style='cursor: pointer' class='page-item'><a data-page='$i' class='page-link scr'>$i</a></li>";
        }  
    }
}    
?>