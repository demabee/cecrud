<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddEmployee;
use App\Http\Requests\UpdateEmployee;
use App\Repositories\EmployeeRepository;


class EmployeeController extends Controller
{
  protected $employee;

  public function __construct(EmployeeRepository $employee){
    $this->employee = $employee;
  }

  public function fetch_data(Request $request){
    if($request->ajax()){
      $employees = $this->employee->all();

      return response()->json($employees);
    }
  }

  public function fetch_specific_employee_in_company(Request $request){
    if($request->ajax()){
      return $this->employee->fetch_table();
    }
  }

  public function add_employee(AddEmployee $request){
    if($request->ajax()){
      $employee = $this->employee->store($request);

      return response()->json($employee);
    }
  }

  public function fetch_employee(Request $request){
    if($request->ajax()){
      return $this->employee->get($request->id);
    }
  }

  public function update_employee(UpdateEmployee $request){
    if($request->ajax()){
      return $this->employee->update($request);
    }
  }

  public function deactivate_employee(Request $request){
    if($request->ajax()){
      return $this->employee->destroy($request->id);
    }
  }
}
