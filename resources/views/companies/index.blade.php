@extends('layouts.app')
@include('layouts.navbar.topbar')
@section('content')
  <div class="container">
    <div class="card" style="margin-top: 50px;">
      <div class="card-header">
        Company Profile
      </div>
      <div class="card-body">
        <form action="" method="POST">
          @csrf
          <div class="row">
            <div class="col-lg-12 d-flex justify-content-center my-3">
              <img id="company_logo" src="{{ $company->logo }}" alt="">
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
              <input type="file">
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 my-2">
              <label class="form-label">
                <strong>Name</strong>
              </label>
              <input class="form-control" type="text" value="{{ $company->name }}" disabled>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 my-2">
              <label class="form-label">
                <strong>Email</strong>
              </label>
              <input class="form-control" type="text" value="{{ $company->email }}" disabled>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 my-3">
              <label class="form-label">
                <strong>Website</strong>
              </label>
              <input class="form-control" type="text" value="{{ $company->website }}" disabled>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <button class="btn btn-success" id="update-company-profile">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    
  </div>
  @push('js')
    @include('scripts.company-js')
  @endpush
@endsection