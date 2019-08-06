

<div class="card border border-warning mt-5" style="margin-left: 10%;margin-right: 10%;border: 5">
    <div class="raw text-center card-header bg-warning">
        <h2 ><?php echo $this->session->userdata('userName'); ?></h2>
    </div>
    <span class="text-success"><?php echo $this->session->flashdata('success'); ?></span>
    <span class="text-danger"><?php echo $this->session->flashdata('picture_updated'); ?></span>
    <div class="card-body">
        <div class="row bg-secondary">
            <div class="col-md-6 text-center bg-dark">
                        <?php foreach ($profile_info as $result){?>
                <img class=" " style="margin: 20px;height: 300px;width: 250px;" src="<?php echo $result->picture?>" alt="Profile Image">
                        <?php }?>
                <div>
                    <form method="post" action="<?php echo base_url()?>Welcome/change_profile" enctype="multipart/form-data">
                        <h4 class="pb-3 text-light">Select Image for change</h4>
                        <input type="hidden" name="userID" value="<?php echo $this->session->userdata('userID'); ?>">
                        <input type="file" name="image" class="float-left text-light">
                        <input class="btn btn-success mb-3" type="submit" value="Change">
                    </form>
                </div>
            </div>
            <div class="col-md-6 mt-5">
                <form class="text-center mr-5 ml-5" method="post" action="<?php echo base_url()?>Welcome/update_personal_info">
                    <?php foreach ($profile_info as $result){?>
                    <input type="hidden" name="userID" value="<?php echo $this->session->userdata('userID'); ?>">
                <div class="form-group">
                    <label for="formGroupExampleInput" class="text-center">Name</label>
                    <input type="text" class="form-control" name="userName" id="formGroupExampleInput" value="<?php echo $result->userName?>">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput" class="text-center">Email</label>
                    <input type="text" class="form-control" name="userEmail" id="formGroupExampleInput" value="<?php echo $result->userEmail?>">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput" class="text-center">Total Meal</label>
                    <input type="text" readonly="TRUE" class="form-control" name="total_meal" id="formGroupExampleInput" value="<?php echo $result->total_meal?>">
                </div>
                    <input class="btn btn-success float-right mt-5" type="submit" value="Update">
                    <?php }?>
            </form>
            </div>
        </div>
    </div>
    <div class="card-footer text-muted">
        <!--<a href="#" class="btn btn-primary">Go somewhere</a>-->
    </div>
</div>