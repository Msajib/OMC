<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Meal Information</title>
    <!--CSS-->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
    <script type="text/javascript" src="<?php echo base_url()?>assets/JS/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <script type="text/javascript">
//    $(document).ready(function(){
//        $("#myModal").modal('show');
//    });
    
    $(function(){
        $("#myModal").modal('show');
        $("#btnValue").click(function(){
                var today = new Date();
                var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                var meal = $('#todayMeal').val();
                alert(meal);
                $.ajax(
                        {
                            type: 'POST',
                            data: {meal: meal,date:date},
                            url: '<?php echo site_url('Welcome/addMeal'); ?>',
                            success: function (response) {
                                alert(response);
                                $('#myModal').modal('hide');
                            }
                        });
            });
        });
    </script>

  </head>
  <body style="background-image: url(<?php echo base_url() ?>image/bg_pic.jpg);background-size: 100% auto;">
      <div class="container-fuild">
            <!--Strat navbar-->
            <nav class="navbar navbar-expand-lg bg-dark" id="navbar">
                <a class="navbar-brand" href="#"><b>OMC</b></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto right">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Meal</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Member
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>
            <!--Close Nevbar-->
            
<!--                            <p>Add Today's Meal Here</p>
                                <div class="modal-title bg-light">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="todayMeal" placeholder="Today's Meal">
                                </div>
                                <button type="submit" class="btn btn-primary right" id="btnValue">Add Meal</button>
                                <span id="result1"></span>
                                </div>-->


           

            <!--Modal Start-->
            <!-- Modal -->
            <div id="myModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body">
                            <p>Add Today's Meal Here</p>
                            <form action="" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="meal" id="todayMeal" placeholder="Today's Meal">
                                </div>
                                <button type="button" class="btn btn-primary right" id="btnValue">Add Meal</button>
                                <span id="result1"></span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--Stop Modal-->
            
             <!-- Footer -->
            <footer class="page-footer font-small blue">

                <!-- Copyright -->
                <div class="footer-copyright text-center py-3">© 2018 Copyright:
                    <a href="https://infobizsoft.com/"> infobizsoft.com</a>
                </div>
                <!-- Copyright -->

            </footer>
            <!-- Footer -->

        </div>
          <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
        
        <script src="<?php echo base_url()?>assets/JS/bootstrap.js"></script>
        <script src="<?php echo base_url()?>assets/JS/bootstrap.min.js"></script>
        <script src="<?php echo base_url()?>assets/JS/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url()?>assets/JS/bootstrap.bundle.js"></script>
     
    </body>
</html>
