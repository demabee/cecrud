@extends('layouts.app')

@section('content')
  <div class="container" style="height: auto;">
    <div class="row align-items-center justify-content-center">
      <div class="col-lg-8">
        
        <div class="card" style="margin-top: 50px;">
          <div class="card-header text-center">
            <img id="company_logo" src="https://via.placeholder.com/250" alt="">
          </div>
          <div class="card-body">
            @if(Session::has('message'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ Session::get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @elseif(Session::has('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
            <form action="{{ route('auth.login') }}" method="POST">
              @csrf
              <div class="form-group">
                <select name="company" class="form-control" id="company">
                  <option value="" disabled selected>Choose a company</option>
                </select>
              </div>
              <div class="form-group">
                <input class="form-control" type="email" placeholder="Username" name="email" autocomplete required>
                @error('message')
                @enderror
              </div>
              <div class="form-group">
                <input class="form-control" type="password" placeholder="Password" name="password" autocomplete required>
              </div>
              <div class="form-group text-center">
                <button class="btn btn-success">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @push('js')
    @include('scripts.login-js')
  @endpush
@endsection