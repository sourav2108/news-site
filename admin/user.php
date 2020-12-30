<?php
require "conn.php";
$page=$_POST['page'];
$limit=3;
$offset=($page-1)*$limit;
$q="select * from user order by role asc limit $offset,$limit";
$r=mysqli_query($conn,$q);

if(mysqli_num_rows($r)>0)
{

    while($row=mysqli_fetch_assoc($r))
    {
        $id=$row['uid'];
     echo "<tr class='text-center'>
            <td>".$row['uid']."</td>
            <td>".$row['full_name']."</td>
            <td>".$row['user_name']."</td>
            <td>".$row['role']."</td>
            <td><button data-uid='$id' class='btn  ue' data-toggle='modal' data-target='#editusermodal'><i class='fas fa-user-edit'></i></button></td>
            <td><button data-uid='$id' class='btn  ud'><i class='fas fa-trash-alt'></i></button></td>
          </tr>";
    }
}
else
{
    echo "no data found";
}
?>