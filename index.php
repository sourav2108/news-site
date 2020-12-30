<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
</head>
<body>
    <div class="container text-center bg-primary">
        <h1 style="color: white;">SK NEWS  <p class="h4 float-right">Date: <?php echo date('d/m/Y');?></p></h1>
    </div>
    <div class="container">
        <ul class="nav nav-pills nav-justified" role="tablist">
            <li class="nav-item"><a data-toggle="tab" role="tab" class="nav-link active" data-cid="100" id="hm" href="#home">HOME</a></li>
            <li class="nav-item"><a data-toggle="tab" role="tab" class="nav-link"  id="sp" data-cid="101" href="#sport">SPORTS</a></li>
            <li class="nav-item"><a data-toggle="tab" role="tab" class="nav-link"  id="st" data-cid="102" href="#state">STATE</a></li>
            <li class="nav-item"><a data-toggle="tab" role="tab" class="nav-link"  id="co" data-cid="103" href="#country">COUNTRY</a></li>
            <li class="nav-item"><a data-toggle="tab" role="tab" class="nav-link"  href="#scr"><input class="form-control" type="text" placeholder="Search" id="search">
            </a></li>
        </ul> 
    </div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-8 tab-content border border-primary">
                <div id="home" class="tab-pane fade show active" role="tabpanel">
                    <ul class="list-unstyled" id="allpost">
                        
                    </ul>
                    <nav>
                        <ul class="pagination justify-content-center pagination-lg" id="homepagination">

                        </ul>
                    </nav>
                </div>
                <div id="sport" class="tab-pane fade" role="tabpanel">
                    <ul class="list-unstyled" id="sppost">
                        
                    </ul>
                    <nav>
                        <ul class="pagination justify-content-center pagination-lg" id="sportpagination">

                        </ul>
                    </nav>
                </div>
                <div id="state" class="tab-pane fade" role="tabpanel">
                    <ul class="list-unstyled" id="stpost">
                        
                    </ul>
                    <nav>
                        <ul class="pagination justify-content-center pagination-lg" id="statepagination">

                        </ul>
                    </nav>
                </div>
                <div id="country" class="tab-pane fade" role="tabpanel">
                    <ul class="list-unstyled" id="copost">
                        
                    </ul>
                    <nav>
                        <ul class="pagination justify-content-center pagination-lg" id="countrypagination">

                        </ul>
                    </nav>
                </div>

                <div id="scr" class="tab-pane fade" role="tabpanel">
                    <ul class="list-unstyled" id="scrpost">
                        <h4 style='color: brown; text-transform: uppercase; text-align: center;'>search item</h4> <hr>
                    </ul>
                    <nav>
                        <ul class="pagination justify-content-center pagination-lg" id="scrpagination">
                            
                        </ul>
                    </nav>
                </div>
            </div> 

            <div class="col-4 border-success">
                  <div class="border">
                      <h4 class="bg-primary p-1">Latest News</h4>
                      <hr>
                      <ul class="list-unstyled" id="latest_news">
                        
                      </ul>
                  </div>
            </div>
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/j1.js"></script>
</body>
</html>