<?php
require "conn.php";
$id=$_POST['eid'];
$q="select * from user where uid=$id";
$r=mysqli_query($conn,$q);
if(mysqli_num_rows($r)>0)
{
    while($row=mysqli_fetch_assoc($r))
    {
        $ind;
        $uid=$row['uid'];
        $fname=$row['full_name'];
        $uname=$row['user_name'];
        $pass=$row['password'];
        $role=$row['role'];
        if($role=='admin')
        {
            $ind="normal";
        }
        else if($role=='normal')
        {
            $ind="admin";
        }
        echo "<form id='editufm'>
        <label for='edituid'>UID</label>
        <input type='text' name='edituid' id='edituid' value='$uid' readonly class='form-control'>
        <label for='editfname'>Name</label>
        <input type='text' name='editfname' value='$fname' id='editfname' class='form-control'>
        <label for='edituname'>User Name</label>
        <input type='text' name='edituname' value='$uname' id='edituname' class='form-control'>
        <label for='editpass'>Password</label>
        <input type='text' name='editpass' value='$pass' id='editpass' class='form-control'>
        <label for='editrole'>Role</label>
        <select name='editrole' id='editrole' class='form-control'>
            <option value='$role'>$role</option>
            <option value='$ind'>$ind</option>
        </select>
        </form>";
    }
}
?>