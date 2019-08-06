<script type="text/javascript">
    $(document).ready(function () {
        $.ajax(
                {
                    url: '<?php echo site_url('Welcome/search_Meal'); ?>',
                    success: function (response) {
                        if (response == "TRUE") {
//                                alert(response);
                            $('#myModal').modal('hide');
                        } else {
                            $('#myModal').modal('show');
                        }
//                            
                    }
                });

    });

    $(function () {
        $("#btn_add_meal").click(function () {
            var today = new Date();
            var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
            var meal = $('#todayMeal').val();
            $.ajax(
                    {
                        type: 'POST',
                        data: {meal: meal, date: date},
                        url: '<?php echo site_url('Welcome/addMeal'); ?>',
                        success: function (response) {
                            if (response == "false") {
                                $('#myModal').modal('hide');
                                $('#success_message').modal('show');
                            } else {
                                $('#myModal').modal('hide');
                            }
                        }
                    });
        });
//        var userID = [];
//        var total_meal = []
//        $("#btn_today_meal").click(function () {
//            var userID = $('#employee_id').val();
//            var total_meal = $('#employee_meal').val();
//        
//            $.ajax(
//                    {
//                        type: 'POST',
//                        data: {userID: userID, total_meal: total_meal},
//                        url: '<?php echo site_url('Welcome/add_Today_Meal'); ?>',
//                        success: function (response) {
//                            console.log(response);
//                            if (response == "false") {
//                                $('#myModal').modal('hide');
//                                $('#success_message').modal('show');
//                            } else {
//                                $('#myModal').modal('hide');
//                            }
//                        }
//                    });
//        });
    });
</script>

</head>
<body style="background-image: url(<?php echo base_url() ?>image/bg_pic.jpg);">
    <div class="container-fuild">
        <!--Strat navbar-->
        <!--         <div class="navbar-header "style="color: white;">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                  <span class="icon-bar bg-light" ></span>                       
              </button>-->
        <nav class="navbar navbar-expand-lg bg-dark" id="navbar">
            <a class="navbar-brand" href="<?php echo base_url() ?>Welcome/index""><b>OMC</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto right">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url() ?>Welcome/index">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url() ?>Welcome/totalMeal">Total Meal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url()?>Welcome/monthly_reports_pdf">Reports</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle border border-info rounded" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Employee
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">List Of Employee</a>
                            <?php foreach ($all_employee as $employee) { ?>
                                <a class="dropdown-item" href="<?php echo base_url() ?>Welcome/employee_profile/<?php echo $employee->userID; ?>"><?php echo $employee->userName; ?></a>
                            <?php } ?>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item bg-dark text-light" href="<?php echo base_url() ?>Welcome/add_new_member">Add Employee</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle border border-info" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img style="width: 35px;height: 32px;" src="<?php echo $this->session->userdata('userImage'); ?>" alt=" <?php echo $this->session->userdata('userName'); ?>">
                            <?php echo $this->session->userdata('userName'); ?>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="<?php echo base_url() ?>Welcome/profile">My Profile</a>
                            <a class="dropdown-item" href="<?php echo base_url() ?>Welcome/password_change">Change Password</a>
                            <a class="dropdown-item" href="<?php echo base_url() ?>Welcome/add_new_member">Add Member</a>
                            <a class="dropdown-item bg-light text-danger" href="<?php echo base_url() ?>Welcome/signout"><b>Sign Out</b></a>
                        </div>
                    </div>
                </form>
            </div>
        </nav>
        <!--</div>-->
        <!--Close Nevbar-->
        <div class="card border border-warning mt-5" style="margin-left: 10%;margin-right: 10%;border: 5px">
            <div class="raw text-center card-header bg-warning">
                <h2 >All Employee of Infobiz</h2>
            <?php echo "Today is " . date("Y/m/d") . "<br>";?>
                Meal Provider : 01788-401341
            </div>
            <div class="card-body">
                <div class="table-wrapper-scroll-y my-custom-scrollbar" style="height: 450px;">

                    <table class="table table-bordered table-striped mb-1 text-center" >
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Total Meal</th>
                                <th scope="col">Picture</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody >
                            <?php
                            $counter = 0;
                            foreach ($all_employee as $employee) {
                                ?>
                                <tr style="height: 15px;">
                                    <th scope="row"><?php echo ++$counter; ?></th>
                                    <td><?php echo $employee->userName ?></td>
                                    <td><?php echo $employee->userEmail ?></td>
                                    <td ><?php echo $employee->total_meal ?></td>
                                    <td >
                                        <img style="width: 60px;height: 70px;" src="<?php echo $employee->picture ?>" alt="Employee Image">
                                    </td>
                                    <td><a class="btn btn-success" href="<?php echo base_url() ?>Welcome/employee_profile/<?php echo $employee->userID ?>">View</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                <!--</div>-->
                </div>
            </div>
            <div class="card-footer text-muted">
                <!--<a href="#" class="btn btn-primary">Go somewhere</a>-->
            </div>
        </div>


        <!--Modal Start-->
        <!-- Modal -->
        <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Welcome To InfobizSoft</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    </div>
                    <div class="modal-body">
                        <p>Add Today's Meal Here</p>
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="meal" id="todayMeal" placeholder="Today's Meal">
                            </div>
                            <button type="button" class="btn btn-primary float-right" id="btn_add_meal">Add Meal</button>
                            <span id="result1"></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Stop Modal-->

        <!--Modal Start Success Message-->
        <!-- Modal -->
        <div id="success_message" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Welcome To InfobizSoft</h4>

                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">

                        <form action="add_Today_Meal" method="post">
                            <?php foreach ($all_employee as $employee) { ?>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <span class="" id="todayMeal"><?php echo $employee->userName ?></span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="hidden" class="form-control" name="employee_id[]" id="employee_id" value="<?php echo $employee->userID ?>">
                                        <input type="number" class="form-control" name="employee_meal[]" id="employee_meal" value="0">
                                    </div>
                                </div>
                            <?php } ?>
                            <button type="submit" class="btn btn-primary float-right" id="btn_today_meal">Add Meal</button>
                            <span id="result1"></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Stop Modal-->