<?php

namespace App\Repositories;

//use Your Model
use App\Models\Employee;

use Illuminate\Support\Facades\Mail;
use App\Mail\MailPassword;
use Illuminate\Support\Str;
use StoreEmployee;

use DataTables;
use Auth;

/**
 * Class EmployeeRepository.
 */
class EmployeeRepository
{
  public function all(){
    return Employee::all();
  }

  public function fetch_table(){
    $session_company_id = session()->get('companyId');
    $data = Employee::where('company_id', $session_company_id)->latest()->get();
    return DataTables::of($data)->addIndexColumn()->addColumn('action', function($row){
        $actionBtn = 
          '<button type="button" id="edit-employee" rel="tooltip" class="btn btn-success btn-icon btn-sm mx-1" data-id="'. $row->id .'" data-original-title="" title="" data-toggle="modal" data-target="#editModal">
            <i class="fa fa-edit p-1"></i>
          </button>'          
          ;

        ($row->is_active == 1) ?
        $actionBtn .= '<button type="button" id="deactivate-employee" rel="tooltip" class="btn btn-danger btn-icon btn-sm mx-1" data-id="'. $row->id .'" data-original-title="" title="" data-toggle="modal" data-target="#deactivateModal">
            <i class="far fa-trash-alt p-1"></i></i>
          </button>'
        :
        $actionBtn .= '<button type="button" id="reactivate-employee" rel="tooltip" class="btn btn-primary btn-icon btn-sm mx-1" data-id="'. $row->id .'" data-original-title="" title="" data-toggle="modal" data-target="#reactivateModal">
            <i class="fas fa-check p-1"></i></i>
          </button>';
          return $actionBtn;
      })->rawColumns(['action'])->make(true);
  }

  public function get($id){
    $employee = Employee::find($id);

    return $employee;
  }
  
  public function store(Object $data){
    $password = Str::random(8);

    StoreEmployee::store_employee($data, session()->get('companyId'), $password);
    
    $details = [
      'first_name' => $data->first_name,
      'last_name' => $data->last_name,
      'email' => $data->emp_email,
      'password' => $password,
    ];

    return $this->mail($details);
  }

  public function mail(array $data){
    Mail::to($data['email'])->send(new MailPassword($data));

    $message = "Successfully added ". $data['first_name'] ." ". $data['last_name'] .". An email will be sent to his account for his credentials. Thank you!";

    return $message;
  }

  public function update(Object $data){
    $employee = $this->get($data->id);

    $message = "Successfully updated ". $employee->first_name ." ". $employee->last_name ."'s information.";

    $employee->first_name = $data->first_name;
    $employee->last_name = $data->last_name;
    $employee->emp_email = $data->emp_email;
    $employee->phone = $data->phone;

    $employee->save();

    return $message;
  }

  public function destroy($id){
    $employee = $this->get($data->id);
    $message = "Deactivated employee: ". $employee->first_name ." ". $employee->last_name .".";
    $employee->is_active = false;

    $employee->save();


    return $message;
  }

}
