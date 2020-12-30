$(document).ready(function(){
    
    function forpost()
    {
        $.ajax({
            url: "post.php",
            type: "POST",
            data: {page:1},
            success: function(data){
                $("#posttb").html(data);
            }
        });
    }
function forcategory()
{
    $.ajax({
        url: "admincategory.php",
        type: "POST",
        data: {page:1},
        success: function(data){
            $("#categorytb").html(data);
        }
    });
}
function foruser()
{
    $.ajax({
        url: "user.php",
        type: "POST",
        data: {page:1},
        success: function(data){
            $("#usertb").html(data);
        }
    });
}
forpost();
forcategory();
foruser();
//for post pagination
function pp(){
    $.ajax({
        url:"adminpostpagination.php",
        type: "POST",
        success: function(data){
            $("#adminpostpagination").html(data);
        }
    });
}
pp();
$(document).on("click",".ap",function(){
    var page=$(this).data("page");
    $(this).closest("li").addClass("active");
    $(this).closest("li").siblings().removeClass("active");
    $.ajax({
        url:"post.php",
        type: "POST",
        data: {page:page},
        success: function(data){
            $("#posttb").html(data);
        }
    });
});
//for category pagination
function cp()
{
    $.ajax({
        url:"admincategorypagination.php",
        type: "POST",
        success: function(data){
            $("#admincategorypagination").html(data);
        }
    });
}
cp();
$(document).on("click",".ac",function(){
    var page=$(this).data("page");
    $(this).closest("li").addClass("active");
    $(this).closest("li").siblings().removeClass("active");
    $.ajax({
        url:"admincategory.php",
        type: "POST",
        data: {page:page},
        success: function(data){
            $("#categorytb").html(data);
        }
    });
});

//for user pagination
function up()
{
    $.ajax({
        url:"adminupagination.php",
        type: "POST",
        success: function(data){
            $("#adminupagination").html(data);
        }
    });
}
up();
$(document).on("click",".ap",function(){
    var page=$(this).data("page");
    $(this).closest("li").addClass("active");
    $(this).closest("li").siblings().removeClass("active");
    $.ajax({
        url:"user.php",
        type: "POST",
        data: {page:page},
        success: function(data){
            $("#usertb").html(data);
        }
    });
});

// for add post
   $("#addpostbtn").click(function(){
    $.ajax({
        url: "loadcategory.php",
        type: "POST",
        success: function(data)
        {
            $("#cat").html(data);
        }
    });
    $.ajax({
        url: "loaduser.php",
        type: "POST",
        success: function(data)
        {
            $("#author").html(data);
        }
    });
   });

//    for add category

  $("#cid").keyup(function(){
     
      var val=$(this).val();
      var pattn=/^[0-9]{3,}$/;
      if(pattn.test(val))
      {
        $("#ad2").attr('disabled', false);
        $("#p1").hide();
      }
      else
      {
        $("#ad2").attr('disabled', true);
          $("#p1").show();
          $("#p1").html("only number and atleast 3 digit");
      }
  });

  $("#ad2").click(function(){
      var id=$("#cid").val();
      var catname=$("#name").val();
      if(id=="" || catname=="")
      {
          alert("plz fill all the field");
      }
      else
      {
          $.ajax({
              url: "addcategory.php",
              type: "POST",
              data: {cid:id,name:catname},
              success: function(data)
              {
                  if(data)
                  {
                     $("#cl").trigger("click");
                     $("#catfm").trigger("reset");
                    alert("successfully insert");
                    forcategory();
                  }
                  else{
                      alert("something went worng ....unable to insert try again");
                }
              }
          });
      }
  });

//   for delete category

$(document).on("click",".catd", function(){
    var id=$(this).data("cid");
    $.ajax({
        url: "deletecategory.php",
        type: "POST",
        data: {cid: id},
        success: function(data)
        {
            if(data)
            {
                forcategory();
            }
            else
            {
                alert("unable to delete");
            }
        }
    });
});

// for edit category
$(document).on("click",".cate", function(){
    var cid=$(this).data("cid");
   $.ajax({
       url: "editcategory.php",
       type: "POST",
       data: {eid: cid},
       success: function(data){
           $("#editcatmodalbody").html(data);
       }
   });
});
$("#editad2").click(function(){
    var id1=$("#editcid").val();
    var catname=$("#editname").val();
    if(id1=="" || catname=="")
    {
        alert("plz fill all the field");
    }
    else
    {
        $.ajax({
            url: "editandaddcategory.php",
            type: "POST",
            data: {cid:id1,name:catname},
            success: function(data)
            {
                if(data)
                {
                   $("#editcl").trigger("click");
                  forcategory();
                  forpost();
                }
                else{
                    alert("something went worng ....unable to insert try again");
              }
            }
        });
    }
});
//   for delete user

$(document).on("click",".ud", function(){
    var id=$(this).data("uid");
    $.ajax({
        url: "deleteuser.php",
        type: "POST",
        data: {uid: id},
        success: function(data)
        {
            if(data)
            {
                foruser();
            }
            else
            {
                alert("unable to delete");
            }
        }
    });
});

// for add user
$("#fname").keyup(function(){
    var val=$(this).val();
    var pattn=/^[a-zA-Z]{2,}/;
    if(pattn.test(val))
    {
      $("#ad3").attr('disabled', false);
      $("#p2").hide();
    }
    else
    {
      $("#ad3").attr('disabled', true);
        $("#p2").show();
        $("#p2").html("only alphabet and atleast 2 char");
    }
});
$("#ad3").click(function(){
    var fname=$("#fname").val();
    var uname=$("#uname").val();
    var pass=$("#pass").val();
    var role=$("#role").val();
    if(fname=="" || uname=="" || pass=="" || role=="")
    {
        alert("plz fill all the field");
    }
    else
    {
        $.ajax({
            url: "adduser.php",
            type: "POST",
            data: $("#ufm").serialize(),
            success: function(data)
            {
                if(data)
                {
                   $("#ucl").trigger("click");
                   $("#ufm").trigger("reset");
                  foruser();
                }
                else{
                    alert("something went worng ....unable to insert try again");
              }
            }
        });
    }
});

// for edit user
$(document).on("click",".ue", function(){
    var uid=$(this).data("uid");
   $.ajax({
       url: "edituser.php",
       type: "POST",
       data: {eid: uid},
       success: function(data){
           $("#editusermodalbody").html(data);
       }
   });
});
$("#editad3").click(function(){
    var fname=$("#editfname").val();
    var uname=$("#edituname").val();
    var pass=$("#editpass").val();
    var role=$("#editrole").val();
    var id=$("#edituid").val();
    if(fname=="" || uname=="" || pass=="" || role=="")
    {
        alert("plz fill all the field");
    }
    else
    {
        $.ajax({
            url: "editandadduser.php",
            type: "POST",
            data: $("#editufm").serialize(),
            success: function(data)
            {
                if(data==1)
                {
                   $("#editusercl").trigger("click");
                //   foruser();
                //   forpost();
                  location="logout.php";
                }
                else{
                    alert("something went worng ....unable to insert try again");
              }
            }
        });
    }
});

//for add post
$("#pfm").submit(function(e){
    e.preventDefault();
    var title=$("#title").val();
    var title1=$("#desc").val();
    var title2=$("#cat").val();
    var title3=$("#author").val();
    var title4=$("#img").val();
    if(title=="" || title1=="" || title2=="" || title3=="" || title4=="")
    {
        alert("plz fill all field");
    }
    else
    {
        var form=new FormData(this);
        $.ajax({
            url: "addpost.php",
            type: "POST",
            data: form,
            contentType: false,
           processData: false,
           success: function(data){
               if(data=='done')
               {
                $("#pcl").trigger("click");
                $("#pfm").trigger("reset");
               forpost();
               forcategory();
               pp();
               }else{
                   alert("not done");
               }
           }
        });
    }
});
//for delete post
$(document).on("click",".pd",function(){
    var pid=$(this).data("pid");
    $.ajax({
        url: "deletepost.php",
        type: "POST",
        data: {id:pid},
        success: function(data){
            if(data)
            {
                forpost();
            }
            else
            {
                alert("something went worng......try again");
            }
        }
    });
});
//for edit post
$(document).on("click",".pe",function(){
    var pid=$(this).data("pid");
   $.ajax({
       url: "editpost.php",
       type: "POST",
       data: {eid: pid},
       success: function(data){
           $("#editpostmodalbody").html(data);
       }
   }); 
});

$(document).on("submit","#editpfm",function(e){
    e.preventDefault();
        var form=new FormData(this);
        $.ajax({
            url: "editandaddpost.php",
            type: "POST",
            data: form,
            contentType: false,
           processData: false,
           success: function(data){
               alert(data);
               $("#epcl").trigger("click");
               forpost();
               forcategory();
           }
        });
    // }
});
});