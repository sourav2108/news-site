<?php
session_start();
session_regenerate_id(true);
if(!isset($_SESSION['username']))
{
    header("location: login.html");
}
else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <title>Admin Page</title>
</head>
<body>
    <div class="container text-center bg-primary">
        <h1>SK NEWS  <a href="logout.php" class="h4" style="float: right; font-weight: bold; color: white;">LOGOUT</a></h1>
    </div>

    <div class="container">
        <ul class="nav nav-pills" role="tablist">
            <li class="nav-item"><a data-toggle="tab" role="tab" class="nav-link active" href="#post">POST</a></li>
            <?php
            if($_SESSION['role']=='admin')
            {
                ?>
                <li class="nav-item"><a data-toggle="tab" role="tab" class="nav-link"  href="#category">CATEGORY</a></li>
                <li class="nav-item"><a data-toggle="tab" role="tab" class="nav-link"  href="#user">USER</a></li>
                <?php
            }
            ?>
        </ul>
    </div>

    <div class="container mt-3 tab-content">
            <div id="post" class="tab-pane fade show active" role="tabpanel">
                <h2>All Posts <button class="btn btn-primary float-right" data-toggle="modal" data-target="#postmodal" id="addpostbtn">ADD POST</button></h2>
                <table class="table">
                    <thead class="table-head table-dark text-center">
                        <tr>
                            <th>PId</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th>Author</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        <tbody class="table-body" id="posttb">
                            
                        </tbody>
                    </thead>
                </table>
                <nav>
                  <ul class="pagination justify-content-center pagination-lg" id="adminpostpagination">

                  </ul>
             </nav>
            </div>
            <div id="category" class="tab-pane fade" role="tabpanel">
                <h2>All Categorys  <button class="btn btn-primary float-right" data-toggle="modal" data-target="#categorymodal" id="addcategorybtn">ADD CATEGORY</button></h2>
                <table class="table">
                    <thead class="table-head table-dark text-center">
                        <tr>
                            <th>CId</th>
                            <th>CATEGORY NAME</th>
                            <th>NUMBER OF POST</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                        <tbody class="table-body" id="categorytb">
                            
                        </tbody>
                </table>
                <nav>
                  <ul class="pagination justify-content-center pagination-lg" id="admincategorypagination">

                  </ul>
             </nav>
            </div>
            <div id="user" class="tab-pane fade" role="tabpanel">
                <h2>All Users  <button class="btn btn-primary float-right" data-target="#usermodal" data-toggle="modal" id="adduserbtn">ADD USER</button></h2>
                <table class="table">
                    <thead class="table-head table-dark text-center">
                        <tr>
                            <th>UId</th>
                            <th>FULL NAME</th>
                            <th>USER NAME</th>
                            <th>ROLE</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                        <tbody class="table-body" id="usertb">
                            
                        </tbody>
                </table>
                <nav>
                  <ul class="pagination justify-content-center pagination-lg" id="adminupagination">

                  </ul>
             </nav>
            </div>
      </div>
<!-- modal for add post -->
<div class="modal fade" id="postmodal" data-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">ADD POST</h5>
                <button type="button" style="background-color: red;" class="btn-close" data-dismiss="modal" id="pcl" aria-label="close">X</button>
            </div>
            <div class="modal-body">
               <form id="pfm">
                   <label for="title">Title</label>
                   <input type="text" name="title" id="title" class="form-control">
                   <label for="cat">Category</label>
                   <select name="category" id="cat" class="form-control">
                       
                   </select>
                   <label for="author">Author</label>
                   <select name="author" id="author" class="form-control">
                       
                   </select>
                   <label for="desc">Description</label>
                   <textarea class="form-control" name="details" id="desc" cols="15" rows="3"></textarea>
                   <label for="img">Select Image</label>
                   <input type="file" name="file" id="img" class="form-control">
                   <input type="submit" class="btn btn-primary mt-2 text-center" value="Submit">
               </form>
            </div>
        </div>
    </div>
</div>

<!-- modal for add category -->
<div class="modal fade" id="categorymodal" data-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">ADD CATEGORY</h5>
                <button type="button" style="background-color: red;" class="btn-close" data-dismiss="modal" aria-label="close">X</button>
            </div>
            <div class="modal-body">
                <form id="catfm">
                    <label for="cid">Category ID</label>
                <input type="text" name="cid" id="cid" class="form-control"><span id="p1" style="color: red; font-size: 15px;"></span><br>
                <label for="name">Category Name</label>
                   <input type="text" name="name" id="name" class="form-control">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="cl">Close</button>
                <button type="button" class="btn btn-primary" id="ad2">ADD</button>
            </div>
        </div>
    </div>
</div>

<!-- modal for add user -->
<div class="modal fade" id="usermodal" data-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">ADD USER</h5>
                <button type="button" style="background-color: red;" class="btn-close" data-dismiss="modal" aria-label="close">X</button>
            </div>
            <div class="modal-body">
               <form id="ufm">
                <label for="fname">Name</label>
                <input type="text" name="fname" id="fname" class="form-control"><span id="p2" style="color: red; font-size: 15px;"></span><br>
                <label for="uname">User Name</label>
                <input type="text" name="uname" id="uname" class="form-control">
                <label for="pass">Password</label>
                <input type="password" name="pass" id="pass" class="form-control">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control">
                    <option value="">Select Role</option>
                    <option value="admin">Admin</option>
                    <option value="normal">Normal</option>
                </select>
               </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="ucl">Close</button>
                <button type="button" class="btn btn-primary" id="ad3">ADD</button>
            </div>
        </div>
    </div>
</div>
    
<!-- modal for edit category -->
<div class="modal fade" id="cateditmodal" data-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">ADD CATEGORY</h5>
                <button type="button" style="background-color: red;" class="btn-close" data-dismiss="modal" aria-label="close">X</button>
            </div>
            <div class="modal-body" id="editcatmodalbody">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="editcl">Close</button>
                <button type="button" class="btn btn-primary" id="editad2">ADD</button>
            </div>
        </div>
    </div>
</div>

<!-- modal for edit user -->
<div class="modal fade" id="editusermodal" data-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">ADD USER</h5>
                <button type="button" style="background-color: red;" class="btn-close" data-dismiss="modal" aria-label="close">X</button>
            </div>
            <div class="modal-body" id="editusermodalbody">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="editusercl">Close</button>
                <button type="button" class="btn btn-primary" id="editad3">ADD</button>
            </div>
        </div>
    </div>
</div>

<!-- modal for edit post -->
<div class="modal fade" id="posteditmodal" data-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">ADD POST</h5>
                <button type="button" style="background-color: red;" class="btn-close" data-dismiss="modal" id="epcl" aria-label="close">X</button>
            </div>
            <div class="modal-body" id="editpostmodalbody">
              
            </div>
        </div>
    </div>
</div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/admin.js"></script>
</body>
</html>
<?php
}?>