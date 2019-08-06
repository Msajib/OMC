<div class="card border border-warning mt-5" style="margin-left: 10%;margin-right: 10%;border: 5">
    <div class="raw text-center card-header bg-warning">
        <h2 ><?php echo $this->session->userdata('userName'); ?></h2>
    </div>
    <div class="card-body">
        <div class="row bg-secondary">
            <div class="col-md-6 text-center bg-dark">
                        <?php foreach ($employee_profile as $result){?>
                <img class=" " style="margin: 20px;height: 300px;width: 250px;" src="<?php echo $result->picture?>" alt="Profile Image">
                        <?php }?>
                
            </div>
            <div class="col-md-6 mt-5">
                    <?php foreach ($employee_profile as $result){?>
                <div class="form-group">
                    <label for="formGroupExampleInput" class="text-center">Name</label>
                    <input type="text" readonly="TRUE" class="form-control" name="userName" id="formGroupExampleInput" value="<?php echo $result->userName?>">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput" class="text-center">Email</label>
                    <input type="text" readonly="TRUE" class="form-control" name="userEmail" id="formGroupExampleInput" value="<?php echo $result->userEmail?>">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput" class="text-center">Total Meal</label>
                    <input type="text" readonly="TRUE" class="form-control" name="total_meal" id="formGroupExampleInput" value="<?php echo $result->total_meal?>">
                </div>
                    <?php }?>
        </div>
    </div>
    <div class="card-footer text-muted">
        <!--<a href="#" class="btn btn-primary">Go somewhere</a>-->
    </div>
</div>
</div>