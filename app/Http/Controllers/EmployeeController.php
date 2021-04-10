<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

}
