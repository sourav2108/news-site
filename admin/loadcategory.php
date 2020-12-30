<?php
 require "conn.php";

 $q="select cid,category_name from category";
 $r=mysqli_query($conn,$q);

 if(mysqli_num_rows($r)>0)
 {
     echo "<option value=''>Select Category</option>";
     while($row=mysqli_fetch_assoc($r))
     {
        $id=$row['cid'];
         echo "<option value='$id'>". $row['category_name']. "</option>";
     }
 }
?>