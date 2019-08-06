<div class="card border border-warning mt-5" style="margin-left: 10%;margin-right: 10%;border: 5">
    <div class="raw text-center card-header bg-warning">
        <h2 ><?php echo $this->session->userdata('userName'); ?></h2>
    </div>
    <span class="text-success"><?php echo $this->session->flashdata('password_change'); ?></span>
    <span class="text-danger"><?php echo $this->session->flashdata('password_change_error'); ?></span>
    <div class="card-body">
        
        <div class="row bg-secondary">
            <div class="col-md-6 text-center bg-dark">
                <img class=" " style="margin: 20px;height: 300px;width: 250px;" src="<?php echo $this->session->userdata('userImage'); ?>" alt="Profile Image">
            </div>
            <div class="col-md-6 mt-5">
                <form class="text-center mr-5 ml-5" method="post" action="<?php echo base_url() ?>Welcome/reset_Password">
                    <input type="hidden" name="userID" value="<?php echo $this->session->userdata('userID'); ?>">
                    <div class="form-group">
                        <label for="formGroupExampleInput" class="text-center">Enter Old Password</label>
                        <input type="text" class="form-control" required="TRUE" name="userPassword" id="formGroupExampleInput"  placeholder="Old Password">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput" class="text-center">Enter New Password</label>
                        <input type="text" class="form-control" id="password" required="TRUE" name="newPassword" id="formGroupExampleInput" onkeyup='check();' placeholder="New Password">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput" class="text-center">Re-Type Your Password</label>
                        <input type="text" required="TRUE" id="confirm_password" class="form-control" name="reType" id="formGroupExampleInput" onkeyup='check();' placeholder="Re-Type Password">
                        <h4 id='message'></h4>
                    </div>
                   
                    <input class="btn btn-success float-right mt-1 mb-1" type="submit" value="Update">
                </form>
            </div>
        </div>
    </div>
    <div class="card-footer text-muted">
        <!--<a href="#" class="btn btn-primary">Go somewhere</a>-->
    </div>
</div>