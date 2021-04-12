<div class="container">
  <div class="row align-items-center justify-content-center">
    <div class="col-lg-8">
      <div class="card" style="margin-top: 50px;">
        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Login</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="createCompany-tab" data-toggle="tab" href="#createCompany" role="tab" aria-controls="createCompany" aria-selected="false">Create Company</a>
          </li>
        </ul>
        <div class="card-body">
          
          <div class="container">
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                @include('auth.login')
              </div>
              <div class="tab-pane fade" id="createCompany" role="tabpanel" aria-labelledby="createCompany-tab">
                @include('companies.add')
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>

