<?php
require "conn.php";
$id=$_POST['eid'];

$q="select * from category where cid=$id";
$r=mysqli_query($conn,$q);
if(mysqli_num_rows($r)>0)
{
    while($row=mysqli_fetch_assoc($r))
    {
        $cid=$row['cid'];
        $name=$row['category_name'];
        echo "<form id='editcatfm'>
        <label for='editcid'>Category ID</label>
    <input type='text' name='editcid' id='editcid' value='$cid' readonly class='form-control'>
    <label for='editname'>Category Name</label>
       <input type='text' name='editname' id='editname' value='$name' class='form-control'>
    </form>";
    }
}
?>