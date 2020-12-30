<?php
require "conn.php";
$page=$_POST['page'];
$limit=5;
$offset=($page-1)*$limit;
$q="select * from post p inner join user u on p.author=u.uid inner join category c on p.category=c.cid order by p.pid desc limit $offset,$limit";
$r=mysqli_query($conn,$q);

if(mysqli_num_rows($r)>0)
{

    while($row=mysqli_fetch_assoc($r))
    {
        $id=$row['pid'];
     echo "<tr class='text-center'>
            <td>".$row['pid']."</td>
            <td>".$row['title']."</td>
            <td>".$row['category_name']."</td>
            <td>".$row['date']."</td>
            <td>".$row['full_name']."</td>
            <td><button data-pid='$id' class='btn pe' data-toggle='modal' data-target='#posteditmodal'><i class='fas fa-edit'></i></button></td>
            <td><button data-pid='$id' class='btn pd'><i class='fas fa-trash-alt'></i></button></td>
          </tr>";
    }
}
else
{
    echo "no data found";
}
?>