<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add an Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <div class="col-lg-6">
            <input type="text" class="form-control" placeholder="First Name" id="firstName" required>
          </div>
          <div class="col-lg-6">
            <input type="text" class="form-control" placeholder="Last Name" id="lastName" required>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-lg-12">
            <input type="email" class="form-control" placeholder="Email Address" id="emp_email" required>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-lg-12">
            <input type="tel" class="form-control" placeholder="Phone Number" id="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="addEmployee">Submit</button>
      </div>
    </div>
  </div>
</div>