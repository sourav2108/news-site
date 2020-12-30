<?php
require "conn.php";
$t=time();
$q="select * from post p inner join category c on p.category=c.cid inner join user u on p.author=u.uid order by p.pid desc limit 3";
$r=mysqli_query($conn,$q);
$num=mysqli_num_rows($r);
if($num>0)
{
    while($row=mysqli_fetch_assoc($r))
    {
        $time=time();
        $time=round(((($t-$row['time'])/60)/60));
        $h=floor($time/24);
        $count=$time-(24*$h);
        $time="$h days $count Hr ago";
        $im= $row['image'];
        $cat=$row['category_name'];
        $id=$row['pid'];
         echo "<li class='media'>
         <img src='pic/$cat/$im'class='align-self-top mt-2 mr-3' style='width: 100px; height: 100px;'>
         <div class='media-body'>
         <h5><a href='postdetails.php?id=$id'>".$row['title']."</a></h5>
         <p style='font-size:12px; font-weight:bold;'><i class='fas fa-tag m-1'></i>".$row['category_name']."<i class='fas fa-user-tie ml-3 mr-1'></i>".$row['full_name']."<i class='fas fa-calendar-check ml-3 mr-1'></i> ".$row['date']."<i class='fas fa-clock ml-3 mr-1'></i>".$time." <br>"."<a href='postdetails.php?id=$id'>Read More</a></p>
         </div>
     </li>";
        
    }
}
else
{
    echo "no data found";
}
?>