<?php

namespace App\Helpers;

use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class StoreEmployee {

  public static function store_employee($data, $id, $password){
    $employee = new Employee;

    if($data->first_name == "" && $data->last_name == "" && $data->phone == ""){
      $data->first_name = "Admin";
      $data->last_name = "Account";
      $data->phone = null;
    }

    $employee->first_name = $data->first_name;
    $employee->last_name = $data->last_name;
    $employee->emp_email = $data->emp_email;
    $employee->phone = $data->phone;
    $employee->company_id = $id;
    $employee->password = Hash::make($password);

    $employee->save();
  }
}