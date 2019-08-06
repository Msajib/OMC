
</head>
<body style="background-image: url(<?php echo base_url() ?>image/bg_pic.jpg);background-size: 100% auto;">
    <div class="container-fuild">
        <!--Strat navbar-->
        <nav class="navbar navbar-expand-lg bg-dark" id="navbar">
            <a class="navbar-brand" href="<?php echo base_url()?>Welcome/index"><b>OMC</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi" data-glyph="menu"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto right">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url()?>Welcome/index">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url()?>Welcome/totalMeal">Total Meal</a>
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
                            <?php foreach ($all_employee as $employee){?>
                            <a class="dropdown-item" href="<?php echo base_url()?>Welcome/employee_profile/<?php echo $employee->userID;?>"><?php echo $employee->userName;?></a>
                            <?php }?>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item bg-dark text-light" href="<?php echo base_url()?>Welcome/add_new_member">Add Employee</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle border border-info" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img style="width: 35px;height: 32px;" src="<?php echo $this->session->userdata('userImage');?>" alt=" <?php echo $this->session->userdata('userName');?>">
                            <?php echo $this->session->userdata('userName');?>
                            
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="<?php echo base_url()?>Welcome/profile">My Profile</a>
                            <a class="dropdown-item" href="<?php echo base_url()?>Welcome/password_change">Change Password</a>
                            <a class="dropdown-item" href="<?php echo base_url()?>Welcome/add_new_member">Add Member</a>
                            <a class="dropdown-item bg-light text-danger" href="<?php echo base_url()?>Welcome/signout"><b>Sign Out</b></a>
                        </div>
                    </div>
                </form>
            </div>
        </nav>
            </div>
        <!--Close Nevbar-->