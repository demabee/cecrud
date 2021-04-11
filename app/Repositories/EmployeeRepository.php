<?php

namespace App\Repositories;

//use Your Model
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailPassword;
use Illuminate\Support\Str;
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
        $actionBtn = '
          <button type="button" id="view-employee" rel="tooltip" class="btn btn-info btn-icon btn-sm text-white mx-1" data-id="'. $row->id .'" data-original-title="View Employee" title="" data-toggle="modal" data-target="#modal-view-employee">
            <i class="fa fa-eye p-1"></i>
          </button>'
          .
          '<button type="button" id="edit-employee" rel="tooltip" class="btn btn-success btn-icon btn-sm mx-1" data-id="'. $row->id .'" data-original-title="" title="" data-toggle="modal" data-target="#modal-edit-employee">
            <i class="fa fa-edit p-1"></i>
          </button>'
          .
          '<button type="button" id="delete-employee" rel="tooltip" class="btn btn-danger btn-icon btn-sm mx-1" data-id="'. $row->id .'" data-original-title="" title="" data-toggle="modal" data-target="#modal-delete-employee">
            <i class="far fa-trash-alt p-1"></i></i>
          </button>'
          ;

          return $actionBtn;
      })->rawColumns(['action'])->make(true);
  }

  
  public function store(Object $data){
    $password = Str::random(8);

    $employee = new Employee;
    $employee->first_name = $data->first_name;
    $employee->last_name = $data->last_name;
    $employee->email = $data->email;
    $employee->phone = $data->phone;
    $employee->company_id = session()->get('companyId');
    $employee->password = Hash::make($password);
    
    $employee->save();
    
    $details = [
      'first_name' => $data->first_name,
      'last_name' => $data->last_name,
      'email' => $data->email,
      'password' => $password,
    ];

    return $this->mail($details);
  }

  public function mail(array $data){
    Mail::to($data['email'])->send(new MailPassword($data));

    $message = "Successfully added ". $data['first_name'] ." ". $data['last_name'] .". An email will be sent to his account for his credentials. Thank you!";

    return $message;
  }

  public function update(array $data){
    return "Something";
  }

  public function destroy($id){
    return "Something";
  }

}
