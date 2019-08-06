<div class="card text-center border border-warning mt-5" style="margin-left: 10%;margin-right: 10%;border: 5">
  <div class="raw card-header bg-warning">
      <h2>Add New Employee</h2>
  </div>
  <div class="card-body">
      <form method="post" action="<?php echo base_url()?>Welcome/add_employee" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" required name="email" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" required name="password" id="inputPassword4" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Full Name</label>
    <input type="text" class="form-control" required id="inputAddress" name="employee_name" placeholder="Enter Full Employee Name">
  </div>
 
<!--  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
  </div>-->
  <div class="form-group">
    <label for="exampleFormControlFile1">Select Employee Image</label>
    <input type="file" class="form-control-file" name="image" required id="exampleFormControlFile1">
  </div>
  <button type="submit" class="btn btn-primary mt-5">Add New Employee</button>
</form>
  </div>
  <div class="card-footer text-muted">
    <!--<a href="#" class="btn btn-primary">Go somewhere</a>-->
  </div>
</div>