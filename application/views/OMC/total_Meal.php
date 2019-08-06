<div class="container">
    <div class="row monthly-report">
        
        <div class="col-md-3 col-md-offset-1 ">
            <h6 class="text-white text-center">
                Select Month to Get Report
                </h6>
        </div>
        <div class = "col-md-3 col-md-offset-7  ">
            <div class="dropdown">
                <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="far fa-file-pdf"></i>Select Month for PDF
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="<?php echo base_url()?>Welcome/getPDF/01"><i class="far fa-file-pdf"></i>January</a>
                    <a class="dropdown-item" href="<?php echo base_url()?>Welcome/getPDF/02">February</a>
                    <a class="dropdown-item" href="<?php echo base_url()?>Welcome/getPDF/03">March</a>
                    <a class="dropdown-item" href="<?php echo base_url()?>Welcome/getPDF/04">April</a>
                    <a class="dropdown-item" href="<?php echo base_url()?>Welcome/getPDF/05">May</a>
                    <a class="dropdown-item" href="<?php echo base_url()?>Welcome/getPDF/06">June</a>
                    <a class="dropdown-item" href="<?php echo base_url()?>Welcome/getPDF/07">July</a>
                    <a class="dropdown-item" href="<?php echo base_url() ?>Welcome/getPDF/08">August</a>
                    <a class="dropdown-item" href="<?php echo base_url() ?>Welcome/getPDF/09">September</a>
                    <a class="dropdown-item" href="<?php echo base_url() ?>Welcome/getPDF/10">October</a>
                    <a class="dropdown-item" href="<?php echo base_url() ?>Welcome/getPDF/11">November</a>
                    <a class="dropdown-item" href="<?php echo base_url() ?>Welcome/getPDF/12">December</a>
                </div>
            </div> 
        </div>

    </div>
</div>
<div class="container mt-1">
    <table class="table table-sm table-light">
        <thead class="table-info text-primary">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Total Meal</th>
                <th scope="col">Posted User</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $counter = 0;
            foreach ($totalMeal as $meal) {
                ?>
                <tr> 
                    <th scope="row"><?php echo ++$counter; ?></th>
                    <td><?php echo $meal->date ?></td>
                    <td ><?php echo $meal->count ?></td>
                    <td><?php echo $meal->user ?></td>
                </tr>
            <?php } ?>


            <tr class="bg-primary text-light">
                <td style="text-align: right;">Total Meal</td>
                <td class="text-danger">=</td>
                <?php
                $count = 0;
                foreach ($totalMeal as $total) {
                    $count += $total->count;
                }
                ?>
                <td colspan="1" class="text-warning"><?php echo $count; ?></td>
                <td>
                    <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_meal">
                          Add Meal
                        </button>
                </td>

            </tr>
        </tbody>
    </table>
</div>


        <!--Modal Start Success Message-->
        <!-- Modal -->
        <div id="add_meal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title text-light">Welcome To InfobizSoft</h4>

                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        

                        <form action="<?php echo base_url()?>Welcome/addMeal" method="post">
                                <div class="row">
                                    
                                    <div class="col-md-6 mb-3"> 
                                        <input type="date" class="form-control" name="date" id="employee_id" value="">
                                    </div>
                                    <div class="col-md-6 mb-3"> 
                                    <input type="number" class="form-control" name="meal" id="employee_meal">
                                    </div>
                                    
                                </div>
                            <button type="submit" class="btn btn-success float-right">Add Meal</button>
                            <span id="result1"></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Stop Modal-->