<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Employee;
use App\Models\Company;
use App\Http\Requests\EmployeeRequest;
use App\Repositories\EmployeeRepository;
use Illuminate\Support\Facades\Storage;

use Session;

class AuthController extends Controller
{
  function view_login(){
    return view('auth.login');
  }

  function check_employee(EmployeeRequest $request){
    $employee = Employee::where('email', $request->email)->first();
    $company = Company::where('id', $employee->company_id)->first();

    if($employee != null){
      if($this->pass_validation($request->password, $employee->password)){
        if($this->is_active($employee->is_active)){
          if($this->affiliated_with($request->company, $employee->company_id)){
            Session::put('LoggedEmployee', $employee->id);
            Session::put('companyId', $employee->company_id);
            Session::put('companyName', $company->name);
            Session::save();

            // dd(Session::get('LoggedEmployee'));
            // $request->session()->put('LoggedEmployee', $employee->id);
            return redirect('/employee');
          } else {
            $message = "Not affiliated with this company.";
            return redirect('/')->with('message', $message);
          }
        } else {
          $message = "Your account has been disabled.";
          return redirect('/')->with('message', $message);
        }
      } else {
        $message = "Wrong username or password. Re-enter and try again.";
        return redirect('/')->with('message', $message);
      }  
    } else {
      $message = "No employee found.";
      return redirect('/')->with('message', $message);
    }
  }

  function logout(){
    if(Session::has('LoggedEmployee')){
      Session::pull('LoggedEmployee');
      return redirect('login');
    }
  }

  function pass_validation($entered_pass, $stored_pass){
    
    return Hash::check($entered_pass, $stored_pass);
  }

  function is_active($active){
    return ($active != 0) ? true : false;
  }

  function affiliated_with($entered_comp, $stored_comp){
    return ($entered_comp == $stored_comp) ? true : false;
  }

  function employee_profile(){
    if(Session::has('LoggedEmployee')){
      $employee = Employee::find(Session::get('LoggedEmployee'));
      return view('employees.index', compact('employee'));
    }
  }

  function company_profile(){
    if(Session::has('LoggedEmployee')){
      $employee = Employee::find(session()->get('LoggedEmployee'));
      $company = Company::find(session()->get('companyId'));
      return view('companies.index', compact('employee', 'company'));
    }
  }


}