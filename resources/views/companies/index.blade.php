@extends('layouts.app')
@include('layouts.navbar.topbar')
@section('content')
  <div class="container">
    <div class="card" style="margin-top: 50px;">
      <div class="card-header">
        Company Profile
      </div>
      <div class="card-body">
        <form action="{{ route('company.update') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method("PUT")
          <div class="row">
            <div class="col-lg-12 d-flex justify-content-center my-3">
              <img id="company_logo" src="{{ asset('storage/images/'.$company->logo)}}" alt="" width="300">
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
              <input type="file" value="" id="logo" accept="image/*" name="logo">
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 my-2">
              <label class="form-label">
                <strong>Name</strong>
              </label>
              <input class="form-control" type="text" value="{{ $company->name }}" id="name" disabled name="name">
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 my-2">
              <label class="form-label">
                <strong>Email</strong>
              </label>
              <input class="form-control" type="text" value="{{ $company->email }}" id="email" disabled name="email">
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 my-3">
              <label class="form-label">
                <strong>Website</strong>
              </label>
              <input class="form-control" type="text" value="{{ $company->website }}" id="website" disabled name="website">
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 d-flex">
              <button type="button" class="btn btn-primary" id="edit-company-profile">Edit</button>
              <button type="submit" class="btn btn-success d-none mx-1" id="update-company-profile">Update</button>
              <button type="button" class="btn btn-secondary d-none mx-1" id="cancel-update">Cancel</button>
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