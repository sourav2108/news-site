<?php
require "conn.php";
$page=$_POST['page'];
$limit=3;
$offset=($page-1)*$limit;
$q="select * from category limit $offset,$limit";
$r=mysqli_query($conn,$q);

if(mysqli_num_rows($r)>0)
{

    while($row=mysqli_fetch_assoc($r))
    {
        $id=$row['cid'];
        $r2=mysqli_query($conn,"select count(*) as total from post where category=$id");
        $t=mysqli_fetch_assoc($r2);
        $total=$t['total'];
     echo "<tr class='text-center'>
            <td>".$row['cid']."</td>
            <td>".$row['category_name']."</td>
            <td>$total</td>
            <td><button data-cid='$id' class='btn cate' data-toggle='modal' data-target='#cateditmodal'><i class='fas fa-edit'></i></button></td>
            <td><button data-cid='$id' class='btn catd'><i class='fas fa-trash-alt'></i></button></td>
          </tr>";
    }
}
else
{
    echo "no data found";
}
?>