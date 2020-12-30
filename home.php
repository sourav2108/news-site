<?php
require "conn.php";
$t=time();
$page=$_POST['page'];
$limit=3;
$offset=($page-1)*$limit;
$q="select * from post p inner join category c on p.category=c.cid inner join user u on p.author=u.uid order by p.pid desc limit $offset,$limit";
$r=mysqli_query($conn,$q);
echo "<h4 style='color: brown; text-transform: uppercase; text-align: center;'>all news</h4> <hr>";
if(mysqli_num_rows($r)>0)
{
    while($row=mysqli_fetch_assoc($r))
    {
        $time=round(((($t-$row['time'])/60)/60));
        $h=floor($time/24);
        $count=$time-(24*$h);
        $time="$h days $count Hr ago";
        $im= $row['image'];
        $cat=$row['category_name'];
        $id=$row['pid'];
     echo "<li class='media'>
     <img src='pic/$cat/$im'class='align-self-center mt-2 mr-3' style='width: 100px; height: 100px;'>
     <div class='media-body'>
         <h5><a href='postdetails.php?id=$id'>".$row['title']."</a></h5>
         <p style='font-size:12px; font-weight:bold;'><i class='fas fa-tag m-1'></i>".$row['category_name']."<i class='fas fa-user-tie ml-3 mr-1'></i>".$row['full_name']."<i class='fas fa-calendar-check ml-3 mr-1'></i> ".$row['date']."<i class='fas fa-clock ml-3 mr-1'></i>".$time."</p>
         <p>".substr($row['details'],0,31)."......</p>
     </div>
 </li>";
    }
}
else
{
    echo "no data found";
}
?>