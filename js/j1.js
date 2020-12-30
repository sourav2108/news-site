$(document).ready(function(){
    // for home page
    function dataload_in_home()
    {
        $.ajax({
            url:"home.php",
            type: "POST",
            data: {page:1},
            success: function(data){
                $("#allpost").html(data);
            }
        });

        $.ajax({
            url:"latestnews.php",
            type: "POST",
            success: function(data){
                $("#latest_news").html(data);
            }
        });
    }
    dataload_in_home();
//for pagination
function pagination(id)
{
    $.ajax({
        url:"homepagination.php",
        type: "POST",
        data: {id:id},
        success: function(data){
            if(id==100)
            {
                $("#homepagination").html(data);
            }
            else if(id==101)
            {
                $("#sportpagination").html(data);
            }
            else if(id==102)
            {
                $("#statepagination").html(data);
            }
            else if(id==103)
            {
                $("#countrypagination").html(data);
            }
        }
    });
}
pagination(100);
//for home pagination
$(document).on("click",".hp",function(){
    var page=$(this).data("page");
    $(this).closest("li").addClass("active");
    $(this).closest("li").siblings().removeClass("active");
    $.ajax({
        url:"home.php",
        type: "POST",
        data: {page:page},
        success: function(data){
            $("#allpost").html(data);
        }
    });
});


// for category pagination
function catp(val)
{
    $(document).on("click",".hp",function(){
        var page=$(this).data("page");
        $(this).closest("li").addClass("active");
        $(this).closest("li").siblings().removeClass("active");
        $.ajax({
            url:"category.php",
            type: "POST",
            data: {page:page,cid:val},
            success: function(data){
                if(val==101)
            {
                $("#sppost").html(data);
            }
            else if(val==102)
            {
                $("#stpost").html(data);
            }
            else if(val==103)
            {
                $("#copost").html(data);
            }
            }
        });
    });
}

function load(val)
{
    $.ajax({
        url:"category.php",
        type: "POST",
        data: {cid:val,page:1},
        success: function(data){
            if(val==101)
            {
                $("#sppost").html(data);
            }
            else if(val==102)
            {
                $("#stpost").html(data);
            }
            else if(val==103)
            {
                $("#copost").html(data);
            }
        }
    });
}
    // for sport page
    $("#sp").click(function(){
          var cid=$(this).data("cid");
          pagination(cid);
          catp(cid);
          load(cid);
    });

    // for state page
    $("#st").click(function(){
        var cid=$(this).data("cid");
        pagination(cid);
        catp(cid);
        load(cid);
  });

//   for country page
$("#co").click(function(){
    var cid=$(this).data("cid");
    pagination(cid);
    catp(cid);
    load(cid);
});

// for search items        
        $("#search").keyup(function(){
            var val=$(this).val();
            $.ajax({
                url: "search.php",
                type: "POST",
                data: {search: val,page:1},
                success: function(data)
                {
                    $("#scrpost").html(data);
                }
            });
            $.ajax({
                url: "searchpagination.php",
                type: "POST",
                data: {item: val},
                success : function(data)
                {
                    $("#scrpagination").html(data);
                }
            });  
        });
        $(document).on("click",".scr",function(){
            var val=$("#search").val();
            var page=$(this).data("page");
            $(this).closest("li").addClass("active");
            $(this).closest("li").siblings().removeClass("active");
            $.ajax({
                url:"search.php",
                type: "POST",
                data: {search: val,page:page},
                success: function(data){
                    $("#scrpost").html(data);
                }
            });
        });
});