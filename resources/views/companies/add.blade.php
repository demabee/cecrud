
<div class="container" style="height: auto;">
  <div class="row align-items-center justify-content-center">
    <div class="col-lg-8">
      
      <div class="card" style="margin-top: 50px;">
        <div class="card-header text-center">
          Create a Company
        </div>
        <div class="card-body">
          <form action="{{ route('companies.add') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-lg-12 d-flex justify-content-center my-3">
                <img id="companyLogo" src="https://via.placeholder.com/250" alt="" width="300">
              </div>
            </div>
            <div class="row my-2">
              <div class="col-lg-12 d-flex justify-content-center">
                <input type="file" value="" id="logo" accept="image/*" name="logo">
              </div>
            </div>
            <div class="form-group">
              <input class="form-control" type="text" placeholder="Company Name" name="name">
            </div>
            <div class="form-group">
              <input class="form-control" type="email" placeholder="Company Email Address" name="email">
            </div>
            <div class="form-group">
              <input class="form-control" type="text" placeholder="Company Website" name="website">
            </div>
            <div class="form-group">
              <input class="form-control" type="email" placeholder="Your Email Address" name="emp_email">
            </div>
            <div class="form-group text-center">
              <button type="Submit" class="btn btn-success">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $('#logo').on('change', function(){
    $('#companyLogo').attr('src', window.URL.createObjectURL(this.files[0]));
  });
</script>