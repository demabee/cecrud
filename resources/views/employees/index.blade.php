@extends('layouts.app')
@include('layouts.navbar.topbar')
@section('content')
  <div class="container">
    <div class="card" style="margin-top: 50px;">
      <div class="card-header">
        <button class="btn btn-primary" id="add-employee">Add Employee</button>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table" id="employee-table">
            <thead class="text-primary">
              <th>ID</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Contact</th>
              <th>Status</th>
              <th>Action</th>
            </thead>
            <tbody>
              
            </tbody>
          </table>
        </div>
        
      </div>
    </div>
    
  </div>
  @push('js')
    @include('scripts.employee-js')
  @endpush
@endsection