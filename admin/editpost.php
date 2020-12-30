<?php
require "conn.php";
$id=$_POST['eid'];
$q="select * from post where pid=$id";
$r=mysqli_query($conn,$q);
if(mysqli_num_rows($r)>0)
{
    while($row=mysqli_fetch_assoc($r))
    {
        $pid=$row['pid'];
        $title=$row['title'];
        $dt=$row['details'];
        $im=$row['image'];
        $cat=$row['category'];
        $ind=realpath($im);
        $q2="select category_name from category where cid=$cat";
        $r2=mysqli_query($conn,$q2);
        $row2=mysqli_fetch_assoc($r2);
        $catname=$row2['category_name'];
        echo " <form id='editpfm'>
        <input type='hidden' name='editpid' id='editpid' readonly value='$pid' class='form-control'>
           <label for='edittitle'>Title</label>
           <input type='text' name='edittitle' id='edittitle' value='$title' class='form-control'>
           <label for='editdesc'>Description</label>
           <textarea class='form-control' name='editdesc' id='editdesc' cols='15' rows='3'>$dt</textarea>
           <label for='editimg'>Select Image</label>
           <input type='file' name='editfile' id='editimg' class='form-control'>
           <input type='hidden' value='$cat' name='editcat'>
           <input type='hidden' value='$im' name='prevfile'>
           Exsist image: <img src='pic/$catname/$im' style='width:100px; height: 100px'><br>
           <input type='submit' class='btn btn-primary mt-2 ml-5 text-center' value='Submit'>
       </form>";
    }
}
?>