<?php
require "conn.php";
$pid=$_GET['id'];
$q="select * from post p inner join category c on p.category=c.cid inner join user u on p.author=u.uid where pid=$pid";
$r=mysqli_query($conn,$q);
$row=mysqli_fetch_assoc($r);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Details</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
</head>
<body>
<div class="container text-center bg-primary">
        <h1>SK NEWS</h1>
    </div>
    <div class="container border boeder-primary mt-3 text-center">
          <img class="img-fluid m-4" style="weight: 400px; height: 400px;" src="pic/<?php echo $row['category_name']?>/<?php  echo $row['image']?>" >
          <h3 class="mt-2"><?php echo $row['title']?></h3>
          <h6><i class="fas fa-user-tie mr-1"></i> <?php echo $row['full_name']?><?php echo " "?> <i class="fas fa-tag ml-3 mr-1"></i> <?php echo $row['date']?></h6>
          <p><?php echo $row['details']?></p>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>