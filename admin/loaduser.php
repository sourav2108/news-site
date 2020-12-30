<?php
 require "conn.php";

 $q="select uid,full_name from user";
 $r=mysqli_query($conn,$q);

 if(mysqli_num_rows($r)>0)
 {
     echo "<option value=''>Select Author</option>";
     while($row=mysqli_fetch_assoc($r))
     {
        $id=$row['uid'];
         echo "<option value='$id'>". $row['full_name']. "</option>";
     }
 }
?>